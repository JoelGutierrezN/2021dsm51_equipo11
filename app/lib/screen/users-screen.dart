import 'dart:convert';
import 'dart:developer';
import 'package:http/http.dart' as http;

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
      'app/usuarios',
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
      appBar: AppBar(
        title: Text('Usuarios'),
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