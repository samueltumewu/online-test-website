
//UNTUK MENAMPILKAN SOAL YANG DIBUAT OLEH AKUN DENGAN HAK AKSES GURU
SELECT pertanyaan.* from detail_soal inner join soal on detail_soal.id_soal=soal.id_soal
inner join pertanyaan on pertanyaan.id_soal=soal.id_soal
where detail_soal.id_client=9