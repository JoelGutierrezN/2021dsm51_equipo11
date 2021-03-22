
import 'dart:convert';

import 'package:flutter/services.dart' show rootBundle;

class _HomePageProvider {
  List<dynamic> informacion = [];

   Future<List<dynamic>> cargarInfo() async{

    final data = await rootBundle.loadString('data/homepage.json');

      Map infoMap = json.decode(data);
      print(infoMap);
      informacion = infoMap['habitacion'];
      return informacion;
  }
}

final homePageProvider = new _HomePageProvider();