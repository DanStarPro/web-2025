PROGRAM SayHello(INPUT, OUTPUT);
USES SysUtils;
VAR
  QueryString, Name: STRING;
  PosName: INTEGER;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  
  QueryString := GetEnvironmentVariable('QUERY_STRING');

  PosName := Pos('name=', QueryString);
  
  IF PosName > 0
  THEN
    BEGIN
      Name := Copy(QueryString, PosName + 5, Length(QueryString) - PosName - 4);
      
      IF Pos('&', Name) > 0 THEN
        Name := Copy(Name, 1, Pos('&', Name) - 1);
      
      WRITELN('Hello dear, ', Name, '!')
    END
  ELSE
    WRITELN('Hello Anonymous!')
END.