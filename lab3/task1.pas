PROGRAM CGIVariables(INPUT, OUTPUT);
USES SysUtils;
BEGIN
  WRITELN('Content-Type: text/html');
  WRITELN;  

  WRITELN('<html>');
  WRITELN('<head><title>CGI Environment Variables</title></head>');
  WRITELN('<body>');
  WRITELN('<h1>CGI Environment Variables</h1>');
  
  WRITELN('<h2>REQUEST_METHOD:</h2>');
  WRITELN('<p>', GetEnvironmentVariable('REQUEST_METHOD'), '</p>');
  
  WRITELN('<h2>QUERY_STRING:</h2>');
  WRITELN('<p>', GetEnvironmentVariable('QUERY_STRING'), '</p>');
  
  WRITELN('<h2>CONTENT_LENGTH:</h2>');
  WRITELN('<p>', GetEnvironmentVariable('CONTENT_LENGTH'), '</p>');
  
  WRITELN('<h2>HTTP_USER_AGENT:</h2>');
  WRITELN('<p>', GetEnvironmentVariable('HTTP_USER_AGENT'), '</p>');
  
  WRITELN('<h2>HTTP_HOST:</h2>');
  WRITELN('<p>', GetEnvironmentVariable('HTTP_HOST'), '</p>');
  
  WRITELN('</body>');
  WRITELN('</html>');
END.