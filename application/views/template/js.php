<script>
  const baseURL = "<?=base_url()?>";
  const currURL = "<?=current_url()?>";
</script>
<?php if(@$jsScript): ?>
  <script src="<?= base_url("js/").$jsScript.'.js' ?>"></script>
<?php endif; ?>
</body>

</html>