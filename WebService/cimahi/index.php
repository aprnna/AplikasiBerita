 <?php
  $url = "http://localhost/Matkul-Penerapan-Teknologi-Internet/WebService/Admin/produk.php";
  // inisialisasi curl   
  $ch = curl_init();
  // mengatur URL yang ingin di load   
  curl_setopt($ch, CURLOPT_URL, $url);
  // mengembalikan data pada URL dalam bentuk String   
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  // mengeksekusi curl   
  $output = curl_exec($ch);

  // Karena data yang di keluarkan dalam bentuk JSON   
  // Maka data output tersebut harus di Decode kedalam bentuk OBJECT   
  $result = json_decode($output);
  ?>

 <!DOCTYPE html>
 <html>

 <head>
   <title>Fashion</title>
 </head>

 <body>
   <h1>Toko Baju</h1>
   <table>
     <?php
      // Inisialisasi nomor urutan   
      $i = 0;

      // Mengecek apakah result memiliki response list produk atau tidak   
      if (count($result->data) > 0) {
        // Melooping data result dan menampilkan data tersebut ke dalam vieew   
        foreach ($result->data as $row) {
          $i++;
          echo ' <tr>   
                         <td width="30px"><center>' . $i . '</center></td>   
                         <td><img width="50px" src="' . $row->foto . '"/></td>   
                         <td width="200px">' . $row->nama_produk . '</td>   
                         <td width="100px">Rp' . number_format($row->harga, 0, '.', '.') . '</td>   
                         <td>   
                             <button onclick="hapus(' . $row->id_produk . ', `' . $row->nama_produk . '`)">Hapus</button>   
                         </td>   
                     </tr>';
        }
      }
      ?>
   </table>
 </body>
 <script>
   //Menghapus produk   
   function hapus(id, nama_produk) {
     if (confirm('Apakah anda yakin ' + nama_produk + ' akan di hapus? ')) {
       window.location.replace("http://localhost/Matkul-Penerapan-Teknologi-Internet/WebService/Admin/hapus.php?id=" + id);
     }
   }
 </script>

 </html>