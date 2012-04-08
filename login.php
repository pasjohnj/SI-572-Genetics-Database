<script type="text/javascript">
<!-- JAVASCRIPT FOR FORM VALIDATION -->
function Validate()
{
  var IsValid = true;

  document.getElementById("UserNameERR").innerHTML = "";
  document.getElementById("PasswordERR").innerHTML = "";

  // Check for a name
  if (document.getElementById("username").value == "") {
    document.getElementById("UserNameERR").innerHTML = "Missing name";
    IsValid = false;
  }
  // Check for an address
  if (document.getElementById("password").value == "") {
    document.getElementById("PasswordERR").innerHTML = "Missing password";
    IsValid = false;
  }	


  return IsValid;

}

</script>