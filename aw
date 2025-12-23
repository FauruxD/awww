Berikut adalah daftar lengkap alamat IP yang harus dimasukkan ke setiap PC berdasarkan perhitungan subnetting /23 (Subnet Mask: 255.255.254.0) dan aturan soal (IP PC = ke-100, Gateway = ke-1).
Silakan input data ini ke dalam menu Desktop > IP Configuration di masing-masing PC:
1. PC0 (Terhubung ke Switch SN_3)
 * IP Address: 172.16.228.100
 * Subnet Mask: 255.255.254.0
 * Default Gateway: 172.16.228.1
2. PC1 (Terhubung ke Switch SN_5)
 * IP Address: 172.16.232.100
 * Subnet Mask: 255.255.254.0
 * Default Gateway: 172.16.232.1
3. PC2 (Terhubung ke Switch SN_7)
 * IP Address: 172.16.236.100
 * Subnet Mask: 255.255.254.0
 * Default Gateway: 172.16.236.1
4. PC3 (Terhubung ke Switch SN_9)
 * IP Address: 172.16.240.100
 * Subnet Mask: 255.255.254.0
 * Default Gateway: 172.16.240.1
5. PC4 (Terhubung ke Switch SN_10)
 * IP Address: 172.16.242.100
 * Subnet Mask: 255.255.254.0
 * Default Gateway: 172.16.242.1
6. PC5 (Terhubung ke Switch SN_12)
 * IP Address: 172.16.246.100
 * Subnet Mask: 255.255.254.0
 * Default Gateway: 172.16.246.1
7. PC6 (Terhubung ke Switch SN_13)
 * IP Address: 172.16.248.100
 * Subnet Mask: 255.255.254.0
 * Default Gateway: 172.16.248.1


PC2 -> Ro1 : 172.16.236.1
Ro1 -> Ro0 : 172.16.251.254
Ro1 -> Ro2 : 172.16.253.254
Ro2 -> Ro3 : 172.16.255.254


Ro0 : conf t
      interface g0/0
      ip address 172.16.228.1 255.255.254.0
      no shutdown
      exit
Ro1 : conf t
      interface g0/0
      ip address 172.16.236.1 255.255.254.0
      no shutdown
      exit

Ro2 : conf t
      interface g0/0
      ip address 172.16.240.1 255.255.254.0
      no shutdown
      exit

Ro3 : conf t
      interface g0/0
      ip address 172.16.242.1 255.255.254.0
      no shutdown
      exit

Ro4 : 

Catatan Penting:
Pastikan saat mengisi Subnet Mask jangan menggunakan default (255.255.0.0), tetapi ubah manual menjadi 255.255.254.0 agar jaringan mau terhubung (sesuai perhitungan /23).
