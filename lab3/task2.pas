PROGRAM SarahRevere(INPUT, OUTPUT);
USES SysUtils;
VAR
  QueryString: STRING;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  
  QueryString := GetEnvironmentVariable('QUERY_STRING');
  
  IF Pos('lanterns=1', QueryString) > 0 THEN
    WRITELN('The British are coming by land')
  ELSE IF Pos('lanterns=2', QueryString) > 0 THEN
    WRITELN('The British are coming by sea')
  ELSE
    WRITELN('Sarah didn''t say')
END.