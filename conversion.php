<?php
    function kg_conversion( int $kg, float $convertL ) {
      $berat[0] = $kg;
      $berat[1] = $kg * 1000;
      $berat[2] = $kg * 1000000;

      if( $convertL == 0 ) 
        $berat[3] = -1;
      else 
        $berat[3] = $kg * $convertL;

      return $berat;
    }

    function g_conversion( int $g, float $convertL ) {
      $berat[0] = $g / 1000.0;
      $berat[1] = $g;
      $berat[2] = $g * 1000;

      if( $convertL == 0 ) 
        $berat[3] = -1;
      else
        $berat[3] = $berat[0] * $convertL;

      return $berat;
    }

    function mg_conversion( int $mg, float $convertL ) {
      $berat[0] = $mg / 1000000.0;
      $berat[1] = $mg / 1000.0;
      $berat[2] = $mg;

      if( $convertL == 0 ) 
        $berat[3] = -1;
      else 
        $berat[3] = $mg * $convertL;

      return $berat;
    }

    function L_conversion( int $L, float $convertL ) {
      $berat[0] = $L * $convertL;
      $berat[1] = $berat[0] / 1000.0;
      $berat[2] = $berat[1] / 1000.0;
      $berat[3] = $L;

      return $berat;
    }

    function get_all_berat( string $berat, float $convertL ) {
      switch( $berat ) {
        case ( substr( $berat, -2 ) == "kg" ) : 
          $weight = kg_conversion( (int)$berat, $convertL ); break;
        case ( substr( $berat, -2 ) == "mg" ) : 
          $weight = mg_conversion( (int)$berat, $convertL ); break;
        case ( substr( $berat, -1 ) == "g" ) : 
          $weight = g_conversion( (int)$berat, $convertL ); break;
        case ( substr( $berat, -1 ) == "L" ) : 
          $weight = L_conversion( (int)$berat, $convertL ); break;
      }

      return $weight;
    }

    $no = 0;
    $satuan = [ "kg", "g", "mg", "L" ];
    $barang = [ [ "Jagung", "303g", 24, 0.0 ], [ "Air aqua botol", "1L", 18, 1 ], [ "Jamur Truffle", "40g", 0, 0.0 ],
                [ "Bubuk Cabai", "400mg", 40, 0.0 ], [ "Beras", "33L", 3, 1.328 ], [ "Selada", "450g", 27, 0.0 ],
                [ "Bubuk merica", "300mg", 35, 0.0 ], [ "Labu", "2kg", 13, 0.0 ], [ "Semangka", "3kg", 7, 0.0 ],
                [ "saffron", "3mg", 0, 0.0 ] ];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3 Praktikum Pemrograman Web</title>
    <link rel="stylesheet" href="style.css">
</head>

<nav>
    <h1> Konversi Berat Barang Dagangan </br> Warung Sayur Pak Joy </h1>
</nav>

<section>
  <table class="initial">
    <tr>
      <th>Nama barang</th>
      <th>Berat satuan</th>
    </tr>
    <tr>
      <?php for( $i = 0; $i < 2; $i++ ) { ?>
        <td> <?php echo $barang[0][$i]; ?> </td>
      <?php } ?>
    </tr>
    <tr>
      <?php for( $i = 0; $i < 2; $i++ ) { ?>
        <td> <?php echo $barang[1][$i]; ?> </td>
      <?php } ?>
    </tr>
    <tr>
      <?php for( $i = 0; $i < 2; $i++ ) { ?>
        <td> <?php echo $barang[2][$i]; ?> </td>
      <?php } ?>
    </tr>
    <tr>
      <?php for( $i = 0; $i < 2; $i++ ) { ?>
        <td> <?php echo $barang[3][$i]; ?> </td>
      <?php } ?>
    </tr>
    <tr>
      <?php for( $i = 0; $i < 2; $i++ ) { ?>
        <td> <?php echo $barang[4][$i]; ?> </td>
      <?php } ?>
    </tr>
    <tr>
      <?php for( $i = 0; $i < 2; $i++ ) { ?>
        <td> <?php echo $barang[5][$i]; ?> </td>
      <?php } ?>
    </tr>
    <tr>
      <?php for( $i = 0; $i < 2; $i++ ) { ?>
        <td> <?php echo $barang[6][$i]; ?> </td>
      <?php } ?>
    </tr>
    <tr>
      <?php for( $i = 0; $i < 2; $i++ ) { ?>
        <td> <?php echo $barang[7][$i]; ?> </td>
      <?php } ?>
    </tr>
    <tr>
      <?php for( $i = 0; $i < 2; $i++ ) { ?>
        <td> <?php echo $barang[8][$i]; ?> </td>
      <?php } ?>
    </tr>
    <tr>
      <?php for( $i = 0; $i < 2; $i++ ) { ?>
        <td> <?php echo $barang[9][$i]; ?> </td>
      <?php } ?>
    </tr>
  </table>
  <p> *Tabel barang dengan berat satuannya </p>
</section>

<body>
  <table class="conversion-table">
    <tr>
        <th>No</th>
        <th>Nama barang</th>
        <th>Berat (kg)</th>
        <th>Berat (g)</th>
        <th>Berat (mg)</th>
        <th>Berat (Litre)</th>
        <th>Stock</th>
    </tr>
    <tr>
        <td> <?php echo $no + 1; ?> </td>
        <?php for( $i = 0; $i < 3; $i++ ) {
          switch( $i ) {
            case 0 : ?> 
              <td> <?php echo $barang[$no][$i];?> </td> 
              <?php break;
            case 1 : { 
              if( $barang[$no][$i + 1] == 0 ) {
                $k = 0;

                while( $k < 4 ) { ?>
                  <td> <?php echo "---"; ?> </td>
                  <?php $k += 1;
                }

                break;
              } else {  
                $berat = get_all_berat( $barang[$no][$i], $barang[$no][3] );
                $j = 0;

                while( $j < 4 ) { 
                  if( $berat[$j] == -1 ) { ?>
                    <td> <?php echo "---"; ?> </td>
                  <?php } else { ?>               
                    <td> <?php echo (string)( $berat[$j] * $barang[$no][$i + 1] ) . $satuan[$j]; ?> </td>
                  <?php }

                  $j++;
                }

                break;
              }
            }
            case 2 : {
              if( $barang[$no][$i] != 0 ) {  ?> 
                <td> <?php echo $barang[$no][$i]; break; ?> </td>
              <?php } else {  ?>
                <td style="background: red; color: white"> <?php echo "kosong"; break; ?> </td> 
              <?php } 
            }
          }
        } $no += 1; ?>
    </tr>
    <tr>
      <td> <?php echo $no + 1; ?> </td>
      <?php for( $i = 0; $i < 3; $i++ ) {
         switch( $i ) {
          case 0 : ?> 
            <td> <?php echo $barang[$no][$i];?> </td> 
            <?php break;
          case 1 : { 
            if( $barang[$no][$i + 1] == 0 ) {
              $k = 0;

              while( $k < 4 ) { ?>
                <td> <?php echo "---"; ?> </td>
                <?php $k += 1;
              }

              break;
            } else {  
              $berat = get_all_berat( $barang[$no][$i], $barang[$no][3] );
              $j = 0;

              while( $j < 4 ) { 
                if( $berat[$j] == -1 ) { ?>
                  <td> <?php echo "---"; ?> </td>
                <?php } else { ?>               
                  <td> <?php echo (string)( $berat[$j] * $barang[$no][$i + 1] ) . $satuan[$j]; ?> </td>
                <?php }

                $j++;
              }

              break;
            }
          }
          case 2 : {
            if( $barang[$no][$i] != 0 ) {  ?> 
              <td> <?php echo $barang[$no][$i]; break; ?> </td>
            <?php } else {  ?>
              <td style="background: red; color: white"> <?php echo "kosong"; break; ?> </td> 
            <?php } 
          }
        }
      } $no += 1; ?>
    </tr>
    <tr>
      <td> <?php echo $no + 1; ?> </td>
      <?php for( $i = 0; $i < 3; $i++ ) {
        switch( $i ) {
          case 0 : ?> 
            <td> <?php echo $barang[$no][$i];?> </td> 
            <?php break;
          case 1 : { 
            if( $barang[$no][$i + 1] == 0 ) {
              $k = 0;

              while( $k < 4 ) { ?>
                <td> <?php echo "---"; ?> </td>
                <?php $k += 1;
              }

              break;
            } else {  
              $berat = get_all_berat( $barang[$no][$i], $barang[$no][3] );
              $j = 0;

              while( $j < 4 ) { 
                if( $berat[$j] == -1 ) { ?>
                  <td> <?php echo "---"; ?> </td>
                <?php } else { ?>               
                  <td> <?php echo (string)( $berat[$j] * $barang[$no][$i + 1] ) . $satuan[$j]; ?> </td>
                <?php }

                $j++;
              }

              break;
            }
          }
          case 2 : {
            if( $barang[$no][$i] != 0 ) {  ?> 
              <td> <?php echo $barang[$no][$i]; break; ?> </td>
            <?php } else {  ?>
              <td style="background: red; color: white"> <?php echo "kosong"; break; ?> </td> 
            <?php } 
          }
        }
      } $no += 1; ?>
    </tr>
    <tr>
        <td> <?php echo $no + 1; ?> </td>
        <?php for( $i = 0; $i < 3; $i++ ) {
          switch( $i ) {
            case 0 : ?> 
              <td> <?php echo $barang[$no][$i];?> </td> 
              <?php break;
            case 1 : { 
              if( $barang[$no][$i + 1] == 0 ) {
                $k = 0;

                while( $k < 4 ) { ?>
                  <td> <?php echo "---"; ?> </td>
                  <?php $k += 1;
                }

                break;
              } else {  
                $berat = get_all_berat( $barang[$no][$i], $barang[$no][3] );
                $j = 0;

                while( $j < 4 ) { 
                  if( $berat[$j] == -1 ) { ?>
                    <td> <?php echo "---"; ?> </td>
                  <?php } else { ?>               
                    <td> <?php echo (string)( $berat[$j] * $barang[$no][$i + 1] ) . $satuan[$j]; ?> </td>
                  <?php }

                  $j++;
                }

                break;
              }
            }
            case 2 : {
              if( $barang[$no][$i] != 0 ) {  ?> 
                <td> <?php echo $barang[$no][$i]; break; ?> </td>
              <?php } else {  ?>
                <td style="background: red; color: white"> <?php echo "kosong"; break; ?> </td> 
              <?php } 
            }
          }
        } $no += 1; ?>
    </tr>
    <tr>
      <td> <?php echo $no + 1; ?> </td>
      <?php for( $i = 0; $i < 3; $i++ ) {
        switch( $i ) {
          case 0 : ?> 
            <td> <?php echo $barang[$no][$i];?> </td> 
            <?php break;
          case 1 : { 
            if( $barang[$no][$i + 1] == 0 ) {
              $k = 0;

              while( $k < 4 ) { ?>
                <td> <?php echo "---"; ?> </td>
                <?php $k += 1;
              }

              break;
            } else {  
              $berat = get_all_berat( $barang[$no][$i], $barang[$no][3] );
              $j = 0;

              while( $j < 4 ) { 
                if( $berat[$j] == -1 ) { ?>
                  <td> <?php echo "---"; ?> </td>
                <?php } else { ?>               
                  <td> <?php echo (string)( $berat[$j] * $barang[$no][$i + 1] ) . $satuan[$j]; ?> </td>
                <?php }

                $j++;
              }

              break;
            }
          }
          case 2 : {
            if( $barang[$no][$i] != 0 ) {  ?> 
              <td> <?php echo $barang[$no][$i]; break; ?> </td>
            <?php } else {  ?>
              <td style="background: red; color: white"> <?php echo "kosong"; break; ?> </td> 
            <?php } 
          }
        }
      } $no += 1; ?>
    </tr>
    <tr>
      <td> <?php echo $no + 1; ?> </td>
      <?php for( $i = 0; $i < 3; $i++ ) {
        switch( $i ) {
          case 0 : ?> 
            <td> <?php echo $barang[$no][$i];?> </td> 
            <?php break;
          case 1 : { 
            if( $barang[$no][$i + 1] == 0 ) {
              $k = 0;

              while( $k < 4 ) { ?>
                <td> <?php echo "---"; ?> </td>
                <?php $k += 1;
              }

              break;
            } else {  
              $berat = get_all_berat( $barang[$no][$i], $barang[$no][3] );
              $j = 0;

              while( $j < 4 ) { 
                if( $berat[$j] == -1 ) { ?>
                  <td> <?php echo "---"; ?> </td>
                <?php } else { ?>               
                  <td> <?php echo (string)( $berat[$j] * $barang[$no][$i + 1] ) . $satuan[$j]; ?> </td>
                <?php }

                $j++;
              }

              break;
            }
          }
          case 2 : {
            if( $barang[$no][$i] != 0 ) {  ?> 
              <td> <?php echo $barang[$no][$i]; break; ?> </td>
            <?php } else {  ?>
              <td style="background: red; color: white"> <?php echo "kosong"; break; ?> </td> 
            <?php } 
          }
        }
      } $no += 1; ?>
    </tr>
    <tr>
    <td> 
      <?php echo $no + 1; ?> </td>
      <?php for( $i = 0; $i < 3; $i++ ) {
        switch( $i ) {
          case 0 : ?> 
            <td> <?php echo $barang[$no][$i];?> </td> 
            <?php break;
          case 1 : { 
            if( $barang[$no][$i + 1] == 0 ) {
              $k = 0;

              while( $k < 4 ) { ?>
                <td> <?php echo "---"; ?> </td>
                <?php $k += 1;
              }

              break;
            } else {  
              $berat = get_all_berat( $barang[$no][$i], $barang[$no][3] );
              $j = 0;

              while( $j < 4 ) { 
                if( $berat[$j] == -1 ) { ?>
                  <td> <?php echo "---"; ?> </td>
                <?php } else { ?>               
                  <td> <?php echo (string)( $berat[$j] * $barang[$no][$i + 1] ) . $satuan[$j]; ?> </td>
                <?php }

                $j++;
              }

              break;
            }
          }
          case 2 : {
            if( $barang[$no][$i] != 0 ) {  ?> 
              <td> <?php echo $barang[$no][$i]; break; ?> </td>
            <?php } else {  ?>
              <td style="background: red; color: white"> <?php echo "kosong"; break; ?> </td> 
            <?php } 
          }
        }
      } $no += 1; ?>
    </tr>
    <tr>
    <td> 
      <?php echo $no + 1; ?> </td>
      <?php for( $i = 0; $i < 3; $i++ ) {
        switch( $i ) {
          case 0 : ?> 
            <td> <?php echo $barang[$no][$i];?> </td> 
            <?php break;
          case 1 : { 
            if( $barang[$no][$i + 1] == 0 ) {
              $k = 0;

              while( $k < 4 ) { ?>
                <td> <?php echo "---"; ?> </td>
                <?php $k += 1;
              }

              break;
            } else {  
              $berat = get_all_berat( $barang[$no][$i], $barang[$no][3] );
              $j = 0;

              while( $j < 4 ) { 
                if( $berat[$j] == -1 ) { ?>
                  <td> <?php echo "---"; ?> </td>
                <?php } else { ?>               
                  <td> <?php echo (string)( $berat[$j] * $barang[$no][$i + 1] ) . $satuan[$j]; ?> </td>
                <?php }

                $j++;
              }

              break;
            }
          }
          case 2 : {
            if( $barang[$no][$i] != 0 ) {  ?> 
              <td> <?php echo $barang[$no][$i]; break; ?> </td>
            <?php } else {  ?>
              <td style="background: red; color: white"> <?php echo "kosong"; break; ?> </td> 
            <?php } 
          }
        }
      } $no += 1; ?>
    </tr>
    <tr>
    <td> 
      <?php echo $no + 1; ?> </td>
      <?php for( $i = 0; $i < 3; $i++ ) {
        switch( $i ) {
          case 0 : ?> 
            <td> <?php echo $barang[$no][$i];?> </td> 
            <?php break;
          case 1 : { 
            if( $barang[$no][$i + 1] == 0 ) {
              $k = 0;

              while( $k < 4 ) { ?>
                <td> <?php echo "---"; ?> </td>
                <?php $k += 1;
              }

              break;
            } else {  
              $berat = get_all_berat( $barang[$no][$i], $barang[$no][3] );
              $j = 0;

              while( $j < 4 ) { 
                if( $berat[$j] == -1 ) { ?>
                  <td> <?php echo "---"; ?> </td>
                <?php } else { ?>               
                  <td> <?php echo (string)( $berat[$j] * $barang[$no][$i + 1] ) . $satuan[$j]; ?> </td>
                <?php }

                $j++;
              }

              break;
            }
          }
          case 2 : {
            if( $barang[$no][$i] != 0 ) {  ?> 
              <td> <?php echo $barang[$no][$i]; break; ?> </td>
            <?php } else {  ?>
              <td style="background: red; color: white"> <?php echo "kosong"; break; ?> </td> 
            <?php } 
          }
        }
      } $no += 1; ?>
    </tr>
    <tr>
    <td> 
      <?php echo $no + 1; ?> </td>
      <?php for( $i = 0; $i < 3; $i++ ) {
        switch( $i ) {
          case 0 : ?> 
            <td> <?php echo $barang[$no][$i];?> </td> 
            <?php break;
          case 1 : { 
            if( $barang[$no][$i + 1] == 0 ) {
              $k = 0;

              while( $k < 4 ) { ?>
                <td> <?php echo "---"; ?> </td>
                <?php $k += 1;
              }

              break;
            } else {  
              $berat = get_all_berat( $barang[$no][$i], $barang[$no][3] );
              $j = 0;

              while( $j < 4 ) { 
                if( $berat[$j] == -1 ) { ?>
                  <td> <?php echo "---"; ?> </td>
                <?php } else { ?>               
                  <td> <?php echo (string)( $berat[$j] * $barang[$no][$i + 1] ) . $satuan[$j]; ?> </td>
                <?php }

                $j++;
              }

              break;
            }
          }
          case 2 : {
            if( $barang[$no][$i] != 0 ) {  ?> 
              <td> <?php echo $barang[$no][$i]; break; ?> </td>
            <?php } else {  ?>
              <td style="background: red; color: white"> <?php echo "kosong"; break; ?> </td> 
            <?php } 
          }
        }
      } $no += 1; ?>
    </tr>
  </table>
</body>

</html>