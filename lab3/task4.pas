PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  SysUtils;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  QueryString, ParamValue: STRING;
  StartPos, EndPos: INTEGER;
BEGIN
  QueryString := GetEnvironmentVariable('QUERY_STRING');
  GetQueryStringParameter := '';
  
  StartPos := Pos(LowerCase(Key) + '=', LowerCase(QueryString));
  
  IF StartPos > 0 THEN
  BEGIN
    StartPos := StartPos + Length(Key) + 1;
    ParamValue := Copy(QueryString, StartPos, Length(QueryString) - StartPos + 1);
    
    EndPos := Pos('&', ParamValue);
    IF EndPos > 0 THEN
      ParamValue := Copy(ParamValue, 1, EndPos - 1);
    
    ParamValue := StringReplace(ParamValue, '+', ' ', [rfReplaceAll]);
    ParamValue := StringReplace(ParamValue, '%20', ' ', [rfReplaceAll]);
    
    GetQueryStringParameter := ParamValue;
  END;
END;

BEGIN 
  WRITELN('Content-Type: text/plain');
  WRITELN;
  
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'));
END.