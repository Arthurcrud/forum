<?php

if (isset($_SESSION['message'])) {
  ?>
    <script>
      window.onload = function() {
        M.toast({
          html: '<?php echo $_SESSION['message']; ?>',
          classes: "rounded teal"
        });
      }
    </script>
    <?php
    unset($_SESSION['mensage']);
}
