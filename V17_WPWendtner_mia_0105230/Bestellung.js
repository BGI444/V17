document.getElementById('login').addEventListener('submit', function(e) {
  e.preventDefault();

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'login.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (this.status == 200) {
      console.log(this.responseText);
    }
  }

  var formData = new FormData(document.getElementById('login'));
  xhr.send(new URLSearchParams(formData).toString());
});
