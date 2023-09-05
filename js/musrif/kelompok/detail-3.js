$(document).ready(() => {
  let btnSubmit = $(".nilai-submit");
  if(btnSubmit.length >= 1) {
    btnSubmit.on('click', function(e) {
      e.preventDefault();
      let MahasiswaID = $(this).data('mahasiswaid');
      let frmNilai = $(`.nilai-${MahasiswaID}`);
      const nilai = [];
      console.log(frmNilai);
      for(let i=0;i<frmNilai.length;i++){
        let val =0;
        if(frmNilai[i].value > 100){
          val = 100;  
        }else if(frmNilai[i].value < 0 || frmNilai[i].value == '') {
          val = 0;  
        }else{
          val = frmNilai[i].value;
        }
        const newNilai = {
          MahasiswaID: frmNilai[i].getAttribute("data-mahasiswaid"),
          PeriodeProgramID: frmNilai[i].getAttribute("data-periodeprogramid"),
          Nilai:val,
        }
        nilai.push(newNilai);
      }
      // console.log(nilai);
      $.ajax({
        method:'post',
        dataType:'json',
        url: baseURL+'musrif/nilaiSet ',
        data: {
          nilai
        },
        timeout: 5000,
        success: function(res) {
          console.log(res);
          if(res.status != 'success') {
            Swal.fire({
              type: 'error',
              title: 'Gagal Menilai',
              text: res.message+'!',
            });
          }else {
            Swal.fire({
              type: 'success',
              title: 'Berhasil Menilai',
              text: res.message+'!',
            });
            console.log(res.nilai_akhir);
            $(`.nilaiakhir-${MahasiswaID}`).empty();
            $(`.nilaiakhir-${MahasiswaID}`).append(res.nilai_akhir)
          }
          // setTimeout(()=>{
          //   location.reload();
          // },3000)
        },
        error: function() {
          Swal.fire({
            type: 'error',
            title: 'Gagal Menilai',
            text: 'Telah terjadi suatu kesalahan!',
          });
        }
      });
    })
  }
})