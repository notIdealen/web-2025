PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  DOS;
  
FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  Qry: STRING;
BEGIN //GetQueryStringParameter
  Qry := GetEnv('QUERY_STRING');
  IF Pos(Key, Qry) > 0
  THEN
    BEGIN
      Qry := Copy(Qry, (Pos(Key, Qry) + Length(Key) + 1), (Length(Qry) - Pos(Key, Qry) - Length(Key)));
      IF Pos('&', Qry) > 0
      THEN
        Qry := Copy(Qry, 1, Pos('&', Qry) - 1);
      GetQueryStringParameter := Qry
    END
  ELSE
    GetQueryStringParameter := 'Data not found'
END; //GetQueryStringParameter

BEGIN {WorkWithQueryString}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('City: ', GetQueryStringParameter('city'));
  WRITELN('Age: ', GetQueryStringParameter('age'));
  WRITELN('Data for test: ?first_name=Sanya&last_name=Dickov&age=186&city=Moscow')
END. {WorkWithQueryString}


