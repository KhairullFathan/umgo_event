<script>
  const baseURL = "<?=base_url()?>";
  const currURL = "<?=current_url()?>";
  $('.custom-file-input').on('change', function () {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
  $('.btn-hapus').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda akan menghapus data ini!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
  });
</script>
<?php if(@$jsScript): ?>
  <script src="<?= base_url("js/").$jsScript.'.js' ?>"></script>
<?php endif; ?>
</body>

</html>