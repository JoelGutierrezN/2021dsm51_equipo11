import 'dart:convert';
import 'dart:developer';

import 'package:app/models/room.dart';
import 'package:dio/dio.dart' as Dio;
import 'package:flutter/material.dart';

import '../dio.dart';

class RoomsScreen extends StatefulWidget{
  @override
  State<StatefulWidget> createState(){
    return RoomsState();
  }
}

class RoomsState extends State<RoomsScreen>{
  Future <List<Room>> getData() async{
    Dio.Response response = await dio().get(
      'app/rooms',
      options: Dio.Options(
        headers: {'auth': false}
        )
      );

    List rooms = json.decode(response.toString());
    log(rooms.toString());
    return rooms.map((room) => Room.fromJson(room)).toList();

  }
  /*Future<Map<String, dynamic>> getUsershttp() async{
    var response = await http.get('http://10.0.2.2:8000/api/users');
    log('Response status: ${response.statusCode}');
    //log('Response body: ${response.body}');
    return json.decode(response.body);
  }*/
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFFFFF3E0),
      appBar: AppBar(
        title: Text('Habitaciones'),
        backgroundColor: Color(0xFFFF5722),
      ),
      body: Center(
        /*child: FutureBuilder(
          future: getUsershttp(),
          builder: (context, snapshot){
            if (snapshot.hasData) {
              return ListView.builder(
                itemCount: snapshot.data.length,
                itemBuilder: (context, index){
                  var user = snapshot.data[index];
                  return ListTile(
                    title: Text('Usuario: ${user.name}'),
                  );
                }
              );
            }else if (snapshot.hasError){
              return Text('Error al cargar los usuarios');
            }
            return CircularProgressIndicator();
          },
        ),*/
        child: FutureBuilder<List<Room>>(
          future: getData(),
          builder: (context, snapshot){
            if (snapshot.hasData) {
              return ListView.builder(
                itemCount: snapshot.data.length,
                itemBuilder: (context, index){
                  var item = snapshot.data[index];
                  return ListTile(
                    leading: Image.network('https://img2.freepng.es/20180331/eow/kisspng-computer-icons-user-clip-art-user-5abf13db298934.2968784715224718991702.jpg'),
                    title: Text('Habitacion: ${item.rank}'),
                    subtitle: Text('Costo: ${item.cost}'),
                    trailing: Icon(Icons.more_vert),
                  );
                }
              );
            }else if(snapshot.hasError){
              return Text('Error al cargar las habitaciones');
            }
            return CircularProgressIndicator();
          }
        ),
      ),
    );
  }
}