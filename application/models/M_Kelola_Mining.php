<?php
class M_Kelola_Mining extends CI_Model
{

	function total_dataset()
	{   
    $query = $this->db->get('dataset');
    	if($query->num_rows()>0)
    {
      	return $query->num_rows();
    }
    	else
    {
      	return 0;
    }
  }

  //---------- KUMPULAN FUNGSI YANG AKAN DILAKUKAN DALAM PROSES MINING ----------
  //function miningC45($atribut, $nilai_atribut)
  function miningC45($atribut, $nilai_atribut)
  {
    $this->perhitunganC45($atribut, $nilai_atribut);
    $this->insertAtributPohonKeputusan($atribut, $nilai_atribut);
    $this->getInfGainMax($atribut, $nilai_atribut);
    $this->replaceNull();
  }

  //#1# Hapus semua DB dan insert default atribut dan nilai atribut
  function populateDb() 
  {
    $this->db->truncate('mining_c45');
    $this->db->truncate('iterasi_c45');
    $this->db->truncate('pohon_keputusan_c45');
    $this->populateAtribut();
  }

  function populateAtribut() 
  {
    $this->db->truncate('atribut');
    $data = array(
    array(
      'id' => '' ,
      'atribut' => 'total' ,
      'nilai_atribut' => 'total'
    ),
    array(
      'id' => '' ,
      'atribut' => 'kuartal' ,
      'nilai_atribut' => 'kuartalsatu'
    ),
    array(
      'id' => '' ,
      'atribut' => 'kuartal' ,
      'nilai_atribut' => 'kuartaldua'
    ),
    array(
      'id' => '' ,
      'atribut' => 'kuartal' ,
      'nilai_atribut' => 'kuartaltiga'
    ),
    array(
      'id' => '' ,
      'atribut' => 'kuartal' ,
      'nilai_atribut' => 'kuartalempat'
    ),
    array(
      'id' => '' ,
      'atribut' => 'hari' ,
      'nilai_atribut' => 'Senin'
    ),
    array(
      'id' => '' ,
      'atribut' => 'hari' ,
      'nilai_atribut' => 'Selasa'
    ),
    array(
      'id' => '' ,
      'atribut' => 'hari' ,
      'nilai_atribut' => 'Rabu'
    ),
    array(
      'id' => '' ,
      'atribut' => 'hari' ,
      'nilai_atribut' => 'Kamis'
    ),
    array(
      'id' => '' ,
      'atribut' => 'hari' ,
      'nilai_atribut' => 'Jumat'
    ),
    array(
      'id' => '' ,
      'atribut' => 'waktu' ,
      'nilai_atribut' => 'Pagi'
    ),
    array(
      'id' => '' ,
      'atribut' => 'waktu' ,
      'nilai_atribut' => 'Siang'
    ),
    array(
      'id' => '' ,
      'atribut' => 'waktu' ,
      'nilai_atribut' => 'Sore'
    ),
    array(
      'id' => '' ,
      'atribut' => 'jenis_permohonan' ,
      'nilai_atribut' => 'KTP'
    ),
    array(
      'id' => '' ,
      'atribut' => 'jenis_permohonan' ,
      'nilai_atribut' => 'KK'
    ),
    array(
      'id' => '' ,
      'atribut' => 'jenis_permohonan' ,
      'nilai_atribut' => 'KIA'
    ));
    $this->db->insert_batch('atribut', $data); 
  }


  // ================ FUNGSI PERHITUNGAN C45 =================
  function perhitunganC45($atribut,$nilai_atribut) 
  {
      if (empty($atribut) AND empty($nilai_atribut)) {
  //#2# Jika atribut yg diinputkan kosong, maka lakukan perhitungan awal
          $kondisiAtribut = ""; // set kondisi atribut kosong
      } else if (!empty($atribut) AND !empty($nilai_atribut)) { 
          // jika atribut tdk kosong, maka select kondisi atribut dari DB ="'.$id_pengambilan.'"
          $sqlKondisiAtribut = $this->db->query("SELECT kondisi_atribut FROM pohon_keputusan_c45 WHERE atribut = '$atribut' AND nilai_atribut = '$nilai_atribut' order by id DESC LIMIT 1");
          return $sqlKondisiAtribut;
          // $rowKondisiAtribut = $sqlKondisiAtribut;
          //$response = array()
        // Select record
        //$this->db->select('jumlah_permohonan,jumlah_pengambilan,jumlah_kk,jumlah_ktp,jumlah_kia,hari,tanggal');
        //$q = $this->db->get('laporan_pelayanan');
        //$response = $q->result_array();
        //return $response;
          $rowKondisiAtribut = mysqli_fetch_array($sqlKondisiAtribut); 
          $kondisiAtribut = str_replace("~", "'", $rowKondisiAtribut['kondisi_atribut']); // replace string ~ menjadi '
      } 
      
      // ambil seluruh atribut
      $sqlAtribut = $this->db->query("SELECT distinct atribut FROM atribut");
      return $sqlAtribut;
      while($getAtribut = mysqli_fetch_array($sqlAtribut)) {
          $getAtribut = $sqlAtribut['atribut'];
          if ($getAtribut === 'total') { 
  //#3# Jika atribut = total, maka hitung jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak
              // hitung jumlah kasus total
              $sqlJumlahKasusTotal = $this->db->query("SELECT COUNT(*) as jumlah_total FROM dataset WHERE tingkat_kepadatan is not null $kondisiAtribut");
              return $sqlJumlahKasusTotal;
              $rowJumlahKasusTotal = mysqli_fetch_array($sqlJumlahKasusTotal);
              $getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah_total'];

              // hitung jumlah kasus layak
              $sqlJumlahKasusLayak = $this->db->query("SELECT COUNT(*) as jumlah_layak FROM dataset WHERE tingkat_kepadatan = 'Padat' AND tingkat_kepadatan is not null $kondisiAtribut");
              return $sqlJumlahLayak;
              $rowJumlahKasusLayak = mysqli_fetch_array($sqlJumlahKasusLayak);
              $getJumlahKasusLayak = $rowJumlahKasusLayak['jumlah_layak'];

              // hitung jumlah kasus tdk layak
              $sqlJumlahKasusTidakLayak = $this->db->query("SELECT COUNT(*) as jumlah_layak FROM dataset WHERE tingkat_kepadatan = 'Tidak Padat' AND tingkat_kepadatan is not null $kondisiAtribut");
              return $sqlJumlahKasusTidakLayak;
              $rowJumlahKasusTidakLayak =  mysqli_fetch_array($sqlJumlahKasusTidakLayak);
              $getJumlahKasusTidakLayak = $rowJumlahKasusTidakLayak['jumlah_tidak_layak'];

  //#4# Insert jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak ke DB
              // insert ke database mining_c45
              $this->db->query("INSERT INTO mining_c45 VALUES ('', 'Total', 'Total', '$getJumlahKasusTotal', '$getJumlahKasusLayak', '$getJumlahKasusTidakLayak', '', '', '', '', '', '')");

          } else {
  //#5# Jika atribut != total (atribut lainnya), maka hitung jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak masing2 atribut
              // ambil nilai atribut
              $sqlNilaiAtribut = $this->db->query("SELECT nilai_atribut FROM atribut WHERE atribut = '$getAtribut' ORDER BY id");
              return $sqlNilaiAtribut;
              while($rowNilaiAtribut = mysqli_fetch_array($sqlNilaiAtribut)) {
                  $getNilaiAtribut = $rowNilaiAtribut['nilai_atribut'];

                  // set kondisi dimana nilai_atribut = berdasakan masing2 atribut dan status data = data training
                  $kondisi = "$getAtribut = '$getNilaiAtribut' AND tingkat_kepadatan is not null $kondisiAtribut";

                  // hitung jumlah kasus per atribut
                  $sqlJumlahKasusTotalAtribut = $this->db->query("SELECT COUNT(*) as jumlah_total FROM data_survey WHERE $kondisi");
                  return $sqlJumlahKasusTotalAtribut;
                  $rowJumlahKasusTotalAtribut = mysqli_fetch_array($sqlJumlahKasusTotalAtribut);
                  $getJumlahKasusTotalAtribut = $rowJumlahKasusTotalAtribut['jumlah_total'];

                  // hitung jumlah kasus layak
                  $sqlJumlahKasusLayakAtribut = $this->db->query("SELECT COUNT(*) as jumlah_layak FROM dataset WHERE $kondisi AND tingkat_kepadatan = 'Padat'");
                  return $sqlJumlahKasusLayakAtribut;
                  $rowJumlahKasusLayakAtribut = mysqli_fetch_array($sqlJumlahKasusLayakAtribut);
                  $getJumlahKasusLayakAtribut = $rowJumlahKasusLayakAtribut['jumlah_layak'];

                  // hitung jumlah kasus TDK layak
                  $sqlJumlahKasusTidakLayakAtribut = $this->db->query("SELECT COUNT(*) as jumlah_tidak_layak FROM dataset WHERE $kondisi AND tingkat_kepadatan = 'Tidak Padat'");
                  return $sqlJumlahKasusTidakLayak;
                  $rowJumlahKasusTidakLayakAtribut = mysqli_fetch_array($sqlJumlahKasusTidakLayakAtribut);
                  $getJumlahKasusTidakLayakAtribut = $rowJumlahKasusTidakLayakAtribut['jumlah_tidak_layak'];

  //#6# Insert jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak masing2 atribut ke DB
                  // insert ke database mining_c45
                  $this->db->query("INSERT INTO mining_c45 VALUES ('', '$getAtribut', '$getNilaiAtribut', '$getJumlahKasusTotalAtribut', '$getJumlahKasusLayakAtribut', '$getJumlahKasusTidakLayakAtribut', '', '', '', '', '', '')");
                  
  //#7# Lakukan perhitungan entropy
                  // perhitungan entropy
                  $sqlEntropy = $this->db->query("SELECT id, jml_kasus_total, jml_padat, jml_tdk_padat FROM mining_c45");
                  return $sqlEntropy;
                  while($rowEntropy = mysqli_fetch_array($sqlEntropy)) {
                      $getJumlahKasusTotalEntropy = $rowEntropy['jml_kasus_total'];
                      $getJumlahKasusLayakEntropy = $rowEntropy['jml_padat'];
                      $getJumlahKasusTidakLayakEntropy = $rowEntropy['jml_tdk_padat'];
                      $idEntropy = $rowEntropy['id'];

                      // jika jml kasus = 0 maka entropy = 0
                      if ($getJumlahKasusTotalEntropy == 0 OR $getJumlahKasusLayakEntropy == 0 OR $getJumlahKasusTidakLayakEntropy == 0) {
                          $getEntropy = 0;
                      // jika jml kasus layak = jml kasus tdk layak, maka entropy = 1
                      } else if ($getJumlahKasusLayakEntropy == $getJumlahKasusTidakLayakEntropy) {
                          $getEntropy = 1;
                      } else { // jika jml kasus != 0, maka hitung rumus entropy:
                          $perbandingan_layak = $getJumlahKasusLayakEntropy / $getJumlahKasusTotalEntropy;
                          $perbandingan_tidak_layak = $getJumlahKasusTidakLayakEntropy / $getJumlahKasusTotalEntropy;

                          $rumusEntropy = (-($perbandingan_layak) * log($perbandingan_layak,2)) + (-($perbandingan_tidak_layak) * log($perbandingan_tidak_layak,2));
                          $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
                      }

  //#8# Update nilai entropy
                      // update nilai entropy
                      $this->db->query("UPDATE mining_c45 SET entropy = $getEntropy WHERE id = $idEntropy");
                  }
                  
  //#9# Lakukan perhitungan information gain
                  // perhitungan information gain
                  // ambil nilai entropy dari total (jumlah kasus total)
                  $sqlJumlahKasusTotalInfGain = $this->db->query("SELECT jml_kasus_total, entropy FROM mining_c45 WHERE atribut = 'Total'");
                  return $sqlJumlahKasusTotalInfGain;
                  $rowJumlahKasusTotalInfGain = mysqli_fetch_array($sqlJumlahKasusTotalInfGain);
                  $getJumlahKasusTotalInfGain = $rowJumlahKasusTotalInfGain['jml_kasus_total'];
                  // rumus information gain
                  $getInfGain = (-(($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain) * ($getEntropy))); 

  //#10# Update information gain tiap nilai atribut (temporary)
                  // update inf_gain_temp (utk mencari nilai masing2 atribut)
                  $this->db->query("UPDATE mining_c45 SET inf_gain_temp = $getInfGain WHERE id = $idEntropy");
                  $getEntropy = $rowJumlahKasusTotalInfGain['entropy'];

                  // jumlahkan masing2 inf_gain_temp atribut 
                  $sqlAtributInfGain = $this->db->query("SELECT SUM(inf_gain_temp) as inf_gain FROM mining_c45 WHERE atribut = '$getAtribut'");
                  return $sqlAtributInfGain;
                  while ($rowAtributInfGain = mysqli_fetch_array($sqlAtributInfGain)) {
                      $getAtributInfGain = $rowAtributInfGain['inf_gain'];

                      // hitung inf gain
                      $getInfGainFix = round(($getEntropy + $getAtributInfGain),4);

  //#11# Looping perhitungan information gain, sehingga mendapatkan information gain tiap atribut. Update information gain
                      // update inf_gain (fix)
                      $this->db->query("UPDATE mining_c45 SET inf_gain = $getInfGainFix WHERE atribut = '$getAtribut'");
                  } 
                  
  //#12# Lakukan perhitungan split info
                  // rumus split info
                  $getSplitInfo = (($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain) * (log(($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain),2)));
                  
  //#13# Update split info tiap nilai atribut (temporary)
                  // update split_info_temp (utk mencari nilai masing2 atribut)
                  $this->db->query("UPDATE mining_c45 SET split_info_temp = $getSplitInfo WHERE id = $idEntropy");
                  
                  // jumlahkan masing2 split_info_temp dari tiap atribut 
                  $sqlAtributSplitInfo = $this->db->query("SELECT SUM(split_info_temp) as split_info FROM mining_c45 WHERE atribut = '$getAtribut'");
                  return $sqlAtributSplitInfo;
                  while ($rowAtributSplitInfo = mysqli_fetch_array($sqlAtributSplitInfo)){
                      $getAtributSplitInfo = $rowAtributSplitInfo['split_info'];

                      // split info fix (4 angka di belakang koma)
                      $getSplitInfoFix = -(round($getAtributSplitInfo,4));

  //#14# Looping perhitungan split info, sehingga mendapatkan information gain tiap atribut. Update information gain
                      // update split info (fix)
                      $this->db->query("UPDATE mining_c45 SET split_info = $getSplitInfoFix WHERE atribut = '$getAtribut'");
                  }
              }
              
  //#15# Lakukan perhitungan gain ratio
              $sqlGainRatio = $this->db->query("SELECT id, inf_gain, split_info FROM mining_c45");
              return $sqlGainRatio;
              while($rowGainRatio = mysqli_fetch_array($sqlGainRatio)) {
                  $idGainRatio = $rowGainRatio['id'];
                  // jika nilai inf gain == 0 dan split info == 0, maka gain ratio = 0
                  if ($rowGainRatio['inf_gain'] == 0 AND $rowGainRatio['split_info'] == 0){
                      $getGainRatio = 0;
                  } else {
                      // rumus gain ratio
                      $getGainRatio = round(($rowGainRatio['inf_gain'] / $rowGainRatio['split_info']),4);
                  }
                  
  //#16# Update gain ratio dari setiap atribut
                  $this->db->query("UPDATE mining_c45 SET gain_ratio = $getGainRatio WHERE id = '$idGainRatio'");
              }
          }
      }
  }



//#17# Insert atribut dgn information gain max ke DB pohon keputusan
function insertAtributPohonKeputusan($atribut, $nilai_atribut)
{
    // ambil nilai inf gain tertinggi dimana hanya 1 atribut saja yg dipilih
    $sqlInfGainMaxTemp = $this->db->query("SELECT distinct atribut, gain_ratio FROM mining_c45 WHERE gain_ratio in (SELECT max(gain_ratio) FROM `mining_c45`) LIMIT 1");
    return $sqlInfGainMaxTemp;
    $rowInfGainMaxTemp = mysqli_fetch_array($sqlInfGainMaxTemp);
    // hanya ambil atribut dimana jumlah kasus totalnya tidak kosong
    if ($rowInfGainMaxTemp['gain_ratio'] > 0) {
        // ambil nilai atribut yang memiliki nilai inf gain max
        $sqlInfGainMax = $this->db->query("SELECT * FROM mining_c45 WHERE atribut = '$rowInfGainMaxTemp[atribut]'");
        while($rowInfGainMax = mysqli_fetch_array($sqlInfGainMax)) {
            if ($rowInfGainMax['jml_padat'] == 0 AND $rowInfGainMax['jml_tdk_padat'] == 0) {
                $keputusan = 'Kosong'; // jika jml_padat = 0 dan jml_tdk_padat = 0, maka keputusan Null
            } else if ($rowInfGainMax['jml_padat'] !== 0 AND $rowInfGainMax['jml_tdk_padat'] == 0) {
                $keputusan = 'Padat'; // jika jml_padat != 0 dan jml_tdk_padat = 0, maka keputusan Layak
            } else if ($rowInfGainMax['jml_padat'] == 0 AND $rowInfGainMax['jml_tdk_padat'] !== 0) {
                $keputusan = 'Tidak Padat'; // jika jml_padat = 0 dan jml_tdk_padat != 0, maka keputusan Tidak Layak
            } else {
                $keputusan = '?'; // jika jml_padat != 0 dan jml_tdk_padat != 0, maka keputusan ?
            }
            
            if (empty($atribut) AND empty($nilai_atribut)) {
//#18# Jika atribut yang diinput kosong (atribut awal) maka insert ke pohon keputusan id_parent = 0
                // set kondisi atribut = AND atribut = nilai atribut
                $kondisiAtribut = "AND $rowInfGainMax[atribut] = ~$rowInfGainMax[nilai_atribut]~";
                // insert ke tabel pohon keputusan
                $this->db->query("INSERT INTO pohon_keputusan_c45 VALUES ('', '$rowInfGainMax[atribut]', '$rowInfGainMax[nilai_atribut]', 0, '$rowInfGainMax[jml_padat]', '$rowInfGainMax[jml_tdk_padat]', '$keputusan', 'Belum', '$kondisiAtribut', 'Belum')");
            }

//#19# Jika atribut yang diinput tidak kosong maka insert ke pohon keputusan dimana id_parent diambil dari tabel pohon keputusan sebelumnya (where atribut = atribut yang diinput)
            else if (!empty($atribut) AND !empty($nilai_atribut)) {
                $sqlIdParent = $this->db->query("SELECT id, atribut, nilai_atribut, jml_padat, jml_tdk_padat FROM pohon_keputusan_c45 WHERE atribut = '$atribut' AND nilai_atribut = '$nilai_atribut' order by id DESC LIMIT 1");
                return $sqlIdParent;
                while($rowIdParent = mysqli_fetch_array($sqlIdParent)) {
                    // insert ke tabel pohon keputusan
                    $this->db->query("INSERT INTO pohon_keputusan_c45 VALUES ('', '$rowInfGainMax[atribut]', '$rowInfGainMax[nilai_atribut]', $rowIdParent[id], '$rowInfGainMax[jml_padat]', '$rowInfGainMax[jml_tdk_padat]', '$keputusan', 'Belum', '', 'Belum')");
                    
                    //#PRE PRUNING (dokumentasi -> http://id3-c45.xp3.biz/dokumentasi/Decision-Tree.10.11.ppt)#
                    // hitung Pessimistic error rate parent dan child 
                    $perhitunganParentPrePruning = $this->loopingPerhitunganPrePruning($rowIdParent['jml_padat'], $rowIdParent['jml_tdk_padat']);
                    $perhitunganChildPrePruning = $this->loopingPerhitunganPrePruning($rowInfGainMax['jml_padat'], $rowInfGainMax['jml_tdk_padat']);
                    
                    // hitung average Pessimistic error rate child 
                    $perhitunganPessimisticChild = (($rowInfGainMax['jml_padat'] + $rowInfGainMax['jml_tdk_padat']) / ($rowIdParent['jml_padat'] + $rowIdParent['jml_tdk_padat'])) * $perhitunganChildPrePruning;
                    // Increment average Pessimistic error rate child
                    $perhitunganPessimisticChildIncrement += $perhitunganPessimisticChild;
                    $perhitunganPessimisticChildIncrement = round($perhitunganPessimisticChildIncrement, 4);
                    
                    // jika error rate pada child lebih besar dari error rate parent
                    if ($perhitunganPessimisticChildIncrement > $perhitunganParentPrePruning) {
                        // hapus child (child tidak diinginkan)
                        $this->db->query("DELETE FROM pohon_keputusan_c45 WHERE id_parent = $rowIdParent[id]");
                        
                        // jika jml kasus layak lbh besar, maka keputusan == layak
                        if ($rowIdParent['jml_padat'] > $rowIdParent['jml_tdk_padat']) {
                            $keputusanPrePruning = 'Padat';
                        // jika jml tdk kasus layak lbh besar, maka keputusan == tdk layak
                        } else if ($rowIdParent['jml_padat'] < $rowIdParent['jml_tdk_padat']) {
                            $keputusanPrePruning = 'Tidak Padat';
                        }
                        // update keputusan parent
                        $this->db->query("UPDATE pohon_keputusan_c45 SET keputusan = '$keputusanPrePruning' where id = $rowIdParent[id]");
                    }
                }
            }
        }
    }
    $this->loopingKondisiAtribut();
}


//#20# Lakukan looping kondisi atribut untuk diproses pada fungsi perhitunganC45()
function loopingKondisiAtribut() 
{
    // ambil semua id dan kondisi atribut
    $sqlLoopingKondisi = $this->db->query("SELECT id, kondisi_atribut FROM pohon_keputusan_c45");
    return $sqlLoopingKondisi;
    while($rowLoopingKondisi = mysqli_fetch_array($sqlLoopingKondisi)) {
        // select semua data dimana id_parent = id awal
        $sqlUpdateKondisi = $this->db->query("SELECT * FROM pohon_keputusan_c45 WHERE id_parent = $rowLoopingKondisi[id] AND looping_kondisi = 'Belum'");
        return $sqlUpdateKondisi;
        while($rowUpdateKondisi = mysqli_fetch_array($sqlUpdateKondisi)) {
            // set kondisi: kondisi sebelumnya yg diselect berdasarkan id_parent ditambah 'AND atribut = nilai atribut'
            $kondisiAtribut = "$rowLoopingKondisi[kondisi_atribut] AND $rowUpdateKondisi[atribut] = ~$rowUpdateKondisi[nilai_atribut]~";
            // update kondisi atribut
            $this->db->query("UPDATE pohon_keputusan_c45 SET kondisi_atribut = '$kondisiAtribut', looping_kondisi = 'Sudah' WHERE id = $rowUpdateKondisi[id]");
        }
    }
    $this->insertIterasi();
}


//#21# Insert iterasi nilai perhitungan ke DB
function insertIterasi()
{
    $sqlInfGainMaxIterasi = $this->db->query("SELECT distinct atribut, gain_ratio FROM mining_c45 WHERE gain_ratio in (SELECT max(gain_ratio) FROM `mining_c45`) LIMIT 1");
    return $sqlInfGainMaxIterasi;
    $rowInfGainMaxIterasi = mysqli_fetch_array($sqlInfGainMaxIterasi);
    // hanya ambil atribut dimana jumlah kasus totalnya tidak kosong
    if ($rowInfGainMaxIterasi['gain_ratio'] > 0) {
        $kondisiAtribut = "$rowInfGainMaxIterasi[atribut]";
        $iterasiKe = 1;
        $sqlInsertIterasiC45 = $this->db->query("SELECT * FROM mining_c45");
        return $sqlInsertIterasiC45;
        while($rowInsertIterasiC45 = mysqli_fetch_array($sqlInsertIterasiC45)) {
            // insert ke tabel iterasi
            $this->db->query("INSERT INTO iterasi_c45 VALUES ('', $iterasiKe, '$kondisiAtribut', '$rowInsertIterasiC45[atribut]', '$rowInsertIterasiC45[nilai_atribut]', '$rowInsertIterasiC45[jml_kasus_total]', '$rowInsertIterasiC45[jml_padat]', '$rowInsertIterasiC45[jml_tdk_padat]', '$rowInsertIterasiC45[entropy]', '$rowInsertIterasiC45[inf_gain]', '$rowInsertIterasiC45[split_info]', '$rowInsertIterasiC45[gain_ratio]')");
            $iterasiKe++;
        }
    }
}

//#22# Ambil information gain max untuk diproses pada fungsi loopingMiningC45()
function getInfGainMax($atribut, $nilai_atribut)
{
    // select inf gain max
    $sqlInfGainMaxAtribut = $this->db->query("SELECT distinct atribut FROM mining_c45 WHERE gain_ratio in (SELECT max(gain_ratio) FROM `mining_c45`) LIMIT 1");
    return $sqlInfGainMaxAtribut;
    while($rowInfGainMaxAtribut = mysqli_fetch_array($sqlInfGainMaxAtribut)) {
        $inf_gain_max_atribut = "$rowInfGainMaxAtribut[atribut]";
        if (empty($atribut) AND empty($nilai_atribut)) {
            // jika atribut kosong, proses atribut dgn inf gain max pada fungsi loopingMiningC45()
            $this->loopingMiningC45($inf_gain_max_atribut);
        } else if (!empty($atribut) AND !empty($nilai_atribut)) {
            // jika atribut tdk kosong, maka update diproses = sudah pada tabel pohon_keputusan_c45
            $this->db->query("UPDATE pohon_keputusan_c45 SET diproses = 'Sudah' WHERE nilai_atribut = '$nilai_atribut'");
            // proses atribut dgn inf gain max pada fungsi loopingMiningC45()
            $this->loopingMiningC45($inf_gain_max_atribut);
        }
    }
}

//#23# Looping proses mining dimana atribut dgn information gain max yang akan diproses pada fungsi miningC45()
function loopingMiningC45($inf_gain_max_atribut) 
{
    $sqlBelumAdaKeputusanLagi = $this->db->query("SELECT * FROM pohon_keputusan_c45 WHERE keputusan = '?' and diproses = 'Belum' AND atribut = '$inf_gain_max_atribut'");
    return $sqlBelumAdaKeputusanLagi;
    while($rowBelumAdaKeputusanLagi = mysqli_fetch_array($sqlBelumAdaKeputusanLagi)) {
        if ($rowBelumAdaKeputusanLagi['id_parent'] == 0) {
            $this->populateAtribut();
        }
        $atribut = "$rowBelumAdaKeputusanLagi[atribut]";
        $nilai_atribut = "$rowBelumAdaKeputusanLagi[nilai_atribut]";
        $kondisiAtribut = "AND $atribut = \'$nilai_atribut\'";
        $this->db->truncate('mining_c45');
        $this->db->query("DELETE FROM atribut WHERE atribut = '$inf_gain_max_atribut'");
        $this->miningC45($atribut, $nilai_atribut);
        $this->populateAtribut();
    }
}

// rumus menghitung Pessimistic error rate
function perhitunganPrePruning($r, $z, $n)
{
    $rumus = ($r + (($z * $z) / (2 * $n)) + ($z * (sqrt(($r / $n) - (($r * $r) / $n) + (($z * $z) / (4 * ($n * $n))))))) / (1 + (($z * $z) / $n));
    $rumus = round($rumus, 4);
    return $rumus;
}

// looping perhitungan Pessimistic error rate
function loopingPerhitunganPrePruning($positif, $negatif)
{
    $z = 1.645; // z = batas kepercayaan (confidence treshold)
    $n = $positif + $negatif; // n = total jml kasus
    $n = round($n, 4);
    // r = perbandingan child thd parent
    if ($positif < $negatif) {
        $r = $positif / ($n);
        $r = round($r, 4);
        return $this->perhitunganPrePruning($r, $z, $n);
    } elseif ($positif > $negatif) {
        $r = $negatif / ($n);
        $r = round($r, 4);
        return $this->perhitunganPrePruning($r, $z, $n);
    } elseif ($positif == $negatif) {
        $r = $negatif / ($n);
        $r = round($r, 4);
        return $this->perhitunganPrePruning($r, $z, $n);
    }
}

// replace keputusan jika ada keputusan yg Null
function replaceNull()
{
    $sqlReplaceNull = $this->db->query("SELECT id, id_parent FROM pohon_keputusan_c45 WHERE keputusan = 'Null'");
    return $sqlReplaceNull;
    while($rowReplaceNull = mysqli_fetch_array($sqlReplaceNull)) {
        $sqlReplaceNullIdParent = $this->db->query("SELECT jml_padat, jml_tdk_padat, keputusan FROM pohon_keputusan_c45 WHERE id = $rowReplaceNull[id_parent]");
        return $sqlReplaceNullIdParent;
        $rowReplaceNullIdParent = mysqli_fetch_array($sqlReplaceNullIdParent);
        if ($rowReplaceNullIdParent['jml_padat'] > $rowReplaceNullIdParent['jml_tdk_padat']) {
            $keputusanNull = 'Padat'; // jika jml_laris != 0 dan jml_tdk_laris = 0, maka keputusan Layak
        } else if ($rowReplaceNullIdParent['jml_padat'] < $rowReplaceNullIdParent['jml_tdk_padat']) {
            $keputusanNull = 'Tidak Padat'; // jika jml_laris = 0 dan jml_tdk_laris != 0, maka keputusan Tidak Layak
        }
        $this->db->query("UPDATE pohon_keputusan_c45 SET keputusan = '$keputusanNull' WHERE id = $rowReplaceNull[id]");
    }
}

}
?>