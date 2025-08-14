<?php
header('Content-Type: application/json');
error_reporting(0); // Don't show PHP warnings, we'll handle errors manually

$netdata_host = 'http://netdata:19999';
$error_log = [];

function curl_get_data($url, &$error_log) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error_log[] = "cURL Error for {$url}: " . curl_error($ch);
        curl_close($ch);
        return null;
    }
    
    curl_close($ch);
    return json_decode($response, true);
}

// --- Fetch Data ---
$cpu_data = curl_get_data($netdata_host . '/api/v1/data?chart=system.cpu&after=-1&points=1&group=average&format=json', $error_log);
$ram_data = curl_get_data($netdata_host . '/api/v1/data?chart=system.ram&after=-1&points=1&group=average&format=json', $error_log);
$uptime_data = curl_get_data($netdata_host . '/api/v1/data?chart=system.uptime&after=-1&points=1&group=average&format=json', $error_log);

// --- Process Data ---
$cpu_usage = $cpu_data ? round($cpu_data['data'][0][1], 2) . '%' : null;
$memory_usage = null;
if ($ram_data) {
    $ram_used_index = array_search('used', $ram_data['dimension_names']);
    $ram_free_index = array_search('free', $ram_data['dimension_names']);
    $ram_used_gb = round($ram_data['data'][0][$ram_used_index] / 1024, 2);
    $ram_total_gb = round(($ram_data['data'][0][$ram_used_index] + $ram_data['data'][0][$ram_free_index]) / 1024, 2);
    $memory_usage = "{$ram_used_gb}GB / {$ram_total_gb}GB";
}
$uptime = null;
if ($uptime_data) {
    $uptime_seconds = $uptime_data['data'][0][1];
    $days = floor($uptime_seconds / (3600 * 24));
    $uptime = "{$days} days";
}

// --- Compile Output ---
$output = [
    'cpu' => $cpu_usage,
    'ram' => $memory_usage,
    'uptime' => $uptime,
    'errors' => empty($error_log) ? null : $error_log
];

echo json_encode($output);
?>
