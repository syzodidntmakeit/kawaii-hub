<?php
// Set the header to output JSON
header('Content-Type: application/json');

// This is the local address of your Netdata container
$netdata_host = 'http://localhost:19999';

// Function to fetch data from a URL
function get_data($url) {
    // Use file_get_contents with a timeout
    $context = stream_context_create(['http' => ['timeout' => 2]]);
    $response = @file_get_contents($url, false, $context);
    if ($response === FALSE) {
        return null;
    }
    return json_decode($response, true);
}

// --- Fetch CPU Usage ---
$cpu_data = get_data($netdata_host . '/api/v1/data?chart=system.cpu&after=-1&points=1&group=average&format=json');
$cpu_usage = $cpu_data ? round($cpu_data['data'][0][1], 2) : null;

// --- Fetch RAM Usage ---
$ram_data = get_data($netdata_host . '/api/v1/data?chart=system.ram&after=-1&points=1&group=average&format=json');
if ($ram_data) {
    $ram_used_index = array_search('used', $ram_data['dimension_names']);
    $ram_free_index = array_search('free', $ram_data['dimension_names']);
    $ram_used_gb = round($ram_data['data'][0][$ram_used_index] / 1024, 2);
    $ram_total_gb = round(($ram_data['data'][0][$ram_used_index] + $ram_data['data'][0][$ram_free_index]) / 1024, 2);
    $memory_usage = "{$ram_used_gb}GB / {$ram_total_gb}GB";
} else {
    $memory_usage = null;
}

// --- Fetch Uptime ---
$uptime_data = get_data($netdata_host . '/api/v1/data?chart=system.uptime&after=-1&points=1&group=average&format=json');
if ($uptime_data) {
    $uptime_seconds = $uptime_data['data'][0][1];
    $days = floor($uptime_seconds / (3600 * 24));
    $uptime = "{$days} days";
} else {
    $uptime = null;
}

// --- Compile the results into a JSON object ---
$output = [
    'cpu' => $cpu_usage,
    'ram' => $memory_usage,
    'uptime' => $uptime
];

// --- Send the JSON back to the homepage ---
echo json_encode($output);
?>
