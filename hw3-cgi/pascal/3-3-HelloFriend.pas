PROGRAM HelloDear(INPUT, OUTPUT);
USES DOS;
VAR
  Name: STRING;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Name := GetEnv('QUERY_STRING');
  Name := Copy(Name, Pos('=', Name) + 1, Length(Name) - Pos('=', Name));
  WRITE('HEllo dear, ');
  IF Name = ''
  THEN
    WRITE('Anonymous')
  ELSE
    WRITE(Name);
  WRITELN('!')
END.
