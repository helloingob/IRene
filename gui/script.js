function irsend($key) {
  $.post("executor.php", { key: $key }, null);
}
