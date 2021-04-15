import 'dart:convert';
import 'dart:developer';

import 'package:app/models/room.dart';
//import 'package:app/screen/rent-room-screen.dart';
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
  Room _room;
  Room get room => _room;
  Future <List<Room>> getData() async{
    Dio.Response response = await dio().get(
      'app/rooms',
      options: Dio.Options(
        headers: {'auth': true}
        )
      );

    List rooms = json.decode(response.toString());
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
        title: Text('Habitaciones',
          style: TextStyle(
            fontFamily: 'Satisfy'
          ),
        ),
        backgroundColor: Color(0xFFFF5722),
      ),
      body: Center(
        child: FutureBuilder<List<Room>>(
          future: getData(),
          builder: (context, snapshot){
            if (snapshot.hasData) {
              return ListView.builder(
                itemCount: snapshot.data.length,
                itemBuilder: (context, index){
                  var item = snapshot.data[index];
                  return ListTile(
                    leading: FadeInImage.assetNetwork(
                              placeholder: 'assets/images/load.gif',
                              fadeInDuration: Duration(milliseconds: 1000),
                              image: 'http://safetydogs.online/laravel/storage/app/rooms/${item.img}',
                            ),
                    title: Text('${item.name}'),
                    subtitle: Text('Costo: \$${item.cost}/dia'),
                    //trailing: Icon(Icons.touch_app_rounded),
                    //onTap: (){
                      //getDataRoom(item.id);
                      //Navigator.push(context, MaterialPageRoute(builder: (context) => RentRoomScreen(room: room)));
                    //},
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

  Future getDataRoom(int id) async{
    Dio.Response response = await dio().get(
      'usuarios/'+id.toString(),
      options: Dio.Options(
        headers: {'auth': true}
        )
      );

    _room = Room.fromJson(json.decode(response.toString()));
  }
}