<HTML>
<HEAD>
<TITLE>Test</TITLE>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("form#main_frm").submit(function(e){
      e.preventDefault();
      process();
    });
  });
  function process()
  {
    // We will already have g-captcha-response here. Pass to next page for processing.
    var key = $("form#main_frm").serialize();
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "process.php",
      data: key,
      // If success, do whatever here (e.g., proceed with processing the rest of the form, if needed)
      success: function(data, textStatus, jqXHR)
      { $("#result").text(JSON.stringify(data)); },
      error: function(jqXHR, textStatus, errorThrown)
      { $("#result").text("Error Details - " + textStatus + ": " + errorThrown); }
    });
  }
</script>
</HEAD>
<BODY>
  <FORM ID='main_frm' action='process.php' method=POST>
    <div class="g-recaptcha" data-sitekey="SITE_KEY"></div>
    <br><br><br>
    <button type=submit>SUBMIT</button>
    <div id='result'></div>
  </FORM>
</BODY>
</HTML>