function w3IncludeHTML() {
  var DENGGz, DENGGi, DENGGa, DENGGfile, DENGGxhttp;
  DENGGz = document.getElementsByTagName("*");
  for (DENGGi = 0; DENGGi < z.length; DENGGi++) {
    if (DENGGz[DENGGi].getAttribute("w3-include-html")) {
      DENGGa = DENGGz[DENGGi].cloneNode(false);
      DENGGfile = DENGGz[DENGGi].getAttribute("w3-include-html");
      DENGGxhttp = new XMLHttpRequest();
      DENGGxhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          a.removeAttribute("w3-include-html");
          a.innerHTML = this.responseText;
          DENGGz[DENGGi].parentNode.replaceChild(DENGGa, DENGGz[DENGGi]);
          w3IncludeHTML();
        }
      }
      DENGGxhttp.open("GET", file, true);
      DENGGxhttp.send();
      return;
    }
  }
}
