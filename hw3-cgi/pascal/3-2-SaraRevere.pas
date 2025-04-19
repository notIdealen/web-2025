PROGRAM PaulRevere(INPUT, OUTPUT);
USES DOS;
{Печать '...by land' для 1 и '...by sea' для 2
 иначе печать сообщения об ошибке}
VAR
  Lanterns: CHAR;
  Str: STRING;
BEGIN {PaulRevere}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Str := GetEnv('QUERY_STRING');
  Str := Copy(Str, Pos('=', str) + 1, Length(str) - Pos('=', str));
  Lanterns := Str[1];
  IF Lanterns = '1'
  THEN
    WRITELN('The British are coming by land.')
  ELSE
    IF Lanterns = '2'
    THEN
      WRITELN('The British are coming by sea.')
    ELSE
      WRITELN('The North Church shows only ''', Lanterns, '''.')
END. {PaulRevere}

