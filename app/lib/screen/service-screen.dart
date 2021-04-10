import 'dart:convert';

import 'package:app/models/service.dart';
import 'package:dio/dio.dart' as Dio;
import 'package:flutter/material.dart';

import '../dio.dart';

class ServiceScreen extends StatefulWidget{
  @override
  State<StatefulWidget> createState(){
    return ServiceState();
  }
}

class ServiceState extends State<ServiceScreen>{
  Future <List<Service>> getServices() async{
    Dio.Response response = await dio().get(
      'app/services',
      options: Dio.Options(
        headers: {'auth': true}
        )
      );

    List services = json.decode(response.toString());
    return services.map((post) => Service.fromJson(post)).toList();
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFFFFF3E0),
      appBar: AppBar(
        title: Text('Servicios',
          style: TextStyle(
            fontFamily: 'Satisfy'
          ),
        ),
        backgroundColor: Color(0xFFFF5722),
      ),
      body: Center(
        child: FutureBuilder<List<Service>>(
          future: getServices(),
          builder: (context, snapshot){
            if (snapshot.hasData) {
              return ListView.builder(
                padding: EdgeInsets.all(20),
                itemCount: snapshot.data.length,
                itemBuilder: (context, index){
                  var item = snapshot.data[index];
                  return Center(
                    child: Card(
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(10.0)
                      ),
                      elevation: 20.0,
                      color: Colors.black,
                      child: Column(
                        children: <Widget>[
                          Padding(padding: EdgeInsets.all(10),
                            child: Text('${item.name}',
                              style: TextStyle(
                                color: Colors.deepOrange,
                                fontSize: 20,
                                fontFamily: 'Satisfy'
                              ),
                            ),
                          ),
                          Padding(padding: EdgeInsets.all(10),
                            child: FadeInImage.assetNetwork(
                                    placeholder: 'assets/images/load.gif',
                                    fadeInDuration: Duration(milliseconds: 1000),
                                    image: 'http://safetydogs.online/laravel/storage/app/services/${item.img}',
                                  ),
                          ),
                          Padding(padding: EdgeInsets.all(10),
                            child: Text('${item.resume}', 
                              textAlign: TextAlign.center,
                              style: TextStyle(
                                color: Colors.white
                              ),
                            ),
                          ),
                          _validarPremium(item),
                        ],
                      ),
                    ),
                  );
                }
              );
            }else if(snapshot.hasError){
              return Text('Error al cargar las publicaciones');
            }
            return CircularProgressIndicator();
          }
        ),
      ),
    );
  }

  Widget _validarPremium(item){
    if(item.premium == 1){
      return Padding(padding:EdgeInsets.all(20),
        child: Text.rich(
          TextSpan(
            children: <TextSpan>[
              TextSpan(
                text: 'Gratis con ',
                style: TextStyle(
                  color: Colors.white
                ),
              ),
              TextSpan(
                text: 'Premium',
                style: TextStyle(
                  color: Colors.deepOrange,
                  fontFamily: 'Satisfy',
                ),
              ),
            ],
          ),
        )
      );
    }else{
       return Padding(padding:EdgeInsets.all(20),
        child: Text.rich(
        TextSpan(
          children: <TextSpan>[
              TextSpan(
                text: 'Con un costo adicional de ',
                style: TextStyle(
                  color: Colors.white
                ),
              ),
              TextSpan(
                text: '\$${item.cost} ',
                style: TextStyle(
                  color: Colors.deepOrange,
                  fontWeight: FontWeight.bold
                ),
              ),
              TextSpan(
                text: 'a tu servicio',
                style: TextStyle(
                  color: Colors.white
                ),
              ),
            ],
          ),
          textAlign: TextAlign.center,
        )
      );
    }
  }
}