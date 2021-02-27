import 'dart:convert';

import 'package:app/models/user.dart';
import 'package:dio/dio.dart' as Dio;
import 'package:flutter/material.dart';

import '../dio.dart';

class UsersScreen extends StatefulWidget{
  @override
  State<StatefulWidget> createState(){
    return UsersState();
  }
}

class UsersState extends State<UsersScreen>{
  Future <List<User>> getUsers() async{
    Dio.Response response = await dio().get(
      'app/users',
      options: Dio.Options(
        headers: {'auth': true}
        )
      );

    List users = json.decode(response.toString());

    return users.map((user) => User.fromJson(user)).toList();

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
        title: Text('Usuarios'),
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
        child: FutureBuilder<List<User>>(
          future: getUsers(),
          builder: (context, snapshot){
            if (snapshot.hasData) {
              return ListView.builder(
                itemCount: snapshot.data.length,
                itemBuilder: (context, index){
                  var item = snapshot.data[index];
                  return ListTile(
                    leading: Image.network('https://img2.freepng.es/20180331/eow/kisspng-computer-icons-user-clip-art-user-5abf13db298934.2968784715224718991702.jpg'),
                    title: Text('Nombre de Usuario: ${item.name}'),
                    subtitle: Text('Rango: ${item.rank}'),
                    trailing: Icon(Icons.more_vert),
                  );
                }
              );
            }else if(snapshot.hasError){
              return Text('Error al cargar los usuarios');
            }
            return CircularProgressIndicator();
          }
        ),
      ),
    );
  }
}