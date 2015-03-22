<?PHP
  if(isset($_POST['g-recaptcha-response']))
  {
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = array('secret' => 'SECRET_KEY', 'response' => $_POST['g-recaptcha-response']);

    $options = array(
      'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
      )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    echo $result;
  }
  else
  {
    $result = array('success' => 'false');
  }
?>