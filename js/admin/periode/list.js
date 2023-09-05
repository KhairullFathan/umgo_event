$(document).ready(() => {
  let btnSwitch = $(".aktifSwitch");
  if(btnSwitch.length >= 1) {
    btnSwitch.on('click', function() {
      let id = $(this).data('id');
      $.ajax({
        method:'post',
        dataType:'json',
        url: baseURL+'admin/periodeSet',
        data: {
          PeriodeID:id
        },
        timeout: 5000,
        success: function(res) {
          console.log(res);
          if(res.status != 'success') {
            Swal.fire({
              type: 'error',
              title: 'Gagal Memperbaharui',
              text: res.message+'!',
            });
          }else {
            Swal.fire({
              type: 'success',
              title: 'Berhasil Memperbaharui',
              text: res.message+'!',
            });
          }
          setTimeout(()=>{
            location.reload();
          },3000)
        },
        error: function() {
          Swal.fire({
            type: 'error',
            title: 'Gagal Memperbaharui',
            text: 'Telah terjadi suatu kesalahan!',
          });
        }
      });
    })
  }
})