# Installing Arch Linux: A No-Bullshit Guide
So, you've decided to install Arch Linux. Good. You're choosing to build your system from the ground up, exactly the way you want it, with no corporate bloat. This is the way.

This guide will walk you through installing a minimal, headless Arch Linux system, perfect for a server. The process is done entirely from the command line, so get ready to feel like a real hacker from a 90s movie.

## Part 0: The Prep Work (Don't fuck around here)
Get your shit together

**Prerequisites**:
1. A Target Machine: The computer where you'll install Arch. For this guide, we're assuming it's your Ryzen 5 5600 machine.
2. A USB Drive: At least 8GB. We're going to wipe it, so don't use one with your precious family photos on it.
3. Another Working Computer: To download the Arch ISO and create the bootable USB.
4. An Internet Connection: An Ethernet cable is your best friend here. Seriously. It makes things a million times easier than messing with Wi-Fi drivers from a command line.
5. Patience & The Arch Wiki: This guide is solid, but the [Arch Wiki](https://wiki.archlinux.org/) is your bible. If you get stuck, the answer is in there.

### Step 1: Download the Arch ISO
Go to the [official Arch Linux](https://archlinux.org/download/) download page and grab the latest ISO file.

### Step 2: Create a Bootable USB
How you do this depends on your current OS.

**On Linux (The Chad Way)**:
Use the `dd` command. It's powerful and fast, but it will absolutely nuke the wrong drive if you're not careful.

First, find your USB drive's name. Plug it in and run `lsblk`. It'll probably be something like `/dev/sdb` or `/dev/sdc`. **TRIPLE-CHECK THIS.**
```
# Example: If your USB is /dev/sdb
sudo dd bs=4M if=/path/to/archlinux.iso of=/dev/sdb status=progress oflag=sync
```
**On Windows/macOS (The "I just want it to work" Way)**:
Use a tool like [Balena Etcher](https://www.balena.io/etcher/) or [Ventoy](https://www.balena.io/etcher/). They have a graphical interface and are much harder to screw up.

## Part 1: Booting and Initial Setup
Time to get our hands dirty.
1. **Boot from the USB**: Plug the USB into your target machine and boot it up. You'll probably need to mash a key like `F2`, `F12`, or `DEL` to get into the BIOS/UEFI settings and select the USB drive as the boot device.
2. **Verify Boot Mode**: Once you're in the Arch live environment, run this command to make sure you've booted in UEFI mode.
```
ls /sys/firmware/efi/efivars
```
If you see a bunch of files, you're in UEFI mode. If you get an error, you're in legacy BIOS mode. This guide assumes UEFI.
3. **Connect to the internet**:
- **Ethernet**: It should just work. Verify with `ping archlinux.org`. If it works, you're golden.
- **Wi-Fi**: This is a pain. But you chose it. Run `iwctl`, then `station list`, then `station <device> scan`, `station <device> get-networks`, and finally `station <device> connect <SSID>`. The Arch Wiki has more details if you ever get stuck. Which you will.
4. **Update the System Clock**:
  ```
  timedatectl set-ntp true
  ```

## Part 2: Disk Partitioning (The Scary Bit)
This is where you wipe your drive. **There is no going back after this.**
1. **Identify Your Drive**: Run `lsblk` to see your drives. Your NVMe drive will likely be `/dev/nvme0n1`. Your HDD will be `/dev/sda`. We're installing on the NVMe.
2. **Partition the Drive**: We'll use `cfdisk`, a simple partitioning tool.
```
cfdisk /dev/nvme0n1
```
- Select `apt` for the partition table type.
- Delete any existing partitions.
- Create the following new partitions:
  1. **EFI System Partition**: Size `512M`, Type `EFI System`.
  2. **Swap Partition**: Size depends on your RAM. `4G` is a safe bet for 16GB of RAM. Type `Linux swap`.
  3. **Root Partition**: Use the remaining space. Type `Linux filesystem`.
- Write the changes and quit.
3. **Format the Partitions**:
  - EFI: `mkfs.fat -F32 /dev/nvme0n1p1`
  - Swap: `mkswap /dev/nvme0n1p2`
  - Root: `mkfs.ext4 /dev/nvme0n1p3`
4. **Mount the Partitions**:
    - Mount the root partition: `mount /dev/nvme0n1p3 /mnt`
    - Turn on swap: `swapon /dev/nvme0n1p2
    - Create the EFI directory and mount it:
      ```
      mkdir /mnt/boot
      mount /dev/nvme0n1p1 /mnt/boot
      ```

## Part 3: The Actual Installation
Let's lay down the base system.
1. **Install Essential Packages**: `pacstrap` is the script that installs Arch onto your newly mounted partitions.
   ```
   pacstrap /mnt base linux linux-firmware amd-ucode nano git networkmanager
   ```
   - `base`, `linux`, `linux-firmware`: The absolute bare minimum.
   - `amd-ucode`: Microcode for your Ryzen CPU (I know you have one. 👀) or use `intel-ucode` if you suck cock.
   - `nano`: A simple text editor. Consider `vim` if you *don't* love yourself.
   - `git`: Because you get it.
   - `networkmanager`: To handle your internet connection after reboot.

## Part 4: Configuring the New System
Now we configure the OS we just installed.
1. **Generate fstab**: This file tells your system what partitions to mount on boot.
   ```
   genfstab -U /mnt >> /mnt/etc/fstab
   ```
2. **Chroot into the System**: This command changes your root directory to `/mnt`, effectively letting you work inside your new Arch installation.
   ```
   arch-chroot /mnt
   ```
3. **Set Time Zone**:
   ```
   # Replace Singapore with your own region/city
    ln -sf /usr/share/zoneinfo/Asia/Singapore /etc/localtime
    hwclock --systohc
   ```
4. **Localization**:
   - Edit `/etc/locale.gen` and uncomment your preferred locale (e.g., `en_US.UTF-8 UTF-8`).
   - Run `locale-gen`.
   - Create `/etc/locale.conf` and add `LANG=en_US.UTF-8`.
5. **Set Hostname**: This is your computer's name on the network.
   ```
   echo "kawaii-server" > /etc/hostname
   ```
6. **Set Root Password: Don't forget this password.**
   ```
   passwd
   ```
7. **Install Bootloader (GRUB):
   ```
   pacman -S grub efibootmgr
   grub-install --target=x86_64-efi --efi-directory=/boot --bootloader-id=GRUB
   grub-mkconfig -o /boot/grub/grub.cfg
   ``

## Part 5: Post-Installation (Almost Done)
Final steps before we can actually use this damn thing.
1. **Create a User**: You should never run as root for daily tasks.
   ```
   useradd -m kendrickLamar
   passwd noBig3onlyBigMe
   ```
2. **Give Your User Sudo Powers**:
   - Install `sudo`:`pacman -S sudo`
   - Run `visudo` and uncomment this line: `%wheel ALL=(ALL:ALL)ALL`
   - Add your user to the `wheel` group: `usermod -aG wheel kendrickLamar`
3. **Enable Essential Services**:
   - Internet: `systemctl enable NetworkManager`
   - SSH (for headless access, which we are)
     ```
     pacman -S openssh
     systemctl enable sshd
     ```
4. **Reboot and Pray**
   - Exit the chroot: `exit`
   - Unmount everything: `umount -R /mnt`
   - Reboot: `reboot
   - **Don't fogrget to remove the USB DRIVE! Baka**
  
## You're IN!
If all went well, your computer will boot into a black screen with a login prompt. Log in with the user you created (`kendrickLamar`). You now have a minimal, functioning Arch Linux server.

From here, the world is your oyster. You can start installing Docker, setting up your server applications, or installing a desktop environment if you're not running headless. Welcome to the club.
