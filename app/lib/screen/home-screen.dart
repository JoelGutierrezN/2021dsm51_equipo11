import 'package:flutter/material.dart';

import 'package:app/providers/auth.dart';

import 'package:app/screen/login-screen.dart';
import 'package:app/forms/premium-form.dart';
import 'package:app/screen/rooms-screen.dart';
import 'package:app/screen/service-screen.dart';
import 'package:provider/provider.dart';
//import 'package:app/providers/homepageprovider.dart';

class HomeScreen extends StatelessWidget {

  @override
  Widget build(BuildContext context) {

    return ListView(
      padding: EdgeInsets.all(20),
      children: <Widget>[
        Consumer<Auth>(
          builder: (context, auth, child) {
            return _vistaHomePage(context, auth);
          }
        ),
      ],
    );
  
  }

  Widget _vistaHomePage(context, auth){
    return Card(
          color: Color(0xFFFFF3E0),
          child: Column(
            children: [
              Card(
                elevation: 20.0,
                color: Colors.blue[700],
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(10.0)
                ),
                child: Column(
                  children: [
                    Divider( height: 5,),
                    Text('Habitaciones',
                      overflow: TextOverflow.clip,
                      style: TextStyle(
                        fontWeight: FontWeight.w400,
                        color: Colors.white,
                        fontSize: 20.0,
                      ),
                    ),
                    Divider( height: 5,),                  
                    FadeInImage(
                      image: AssetImage('assets/images/room.png'),
                      placeholder: AssetImage('assets/images/load.gif'), 
                      fadeInDuration: Duration( milliseconds: 1000),
                      height: 184,
                      fit: BoxFit.cover,
                    ),
                    Divider( height: 5,),
                    Text(
                      'Contamos con variedad de habitaciones que \n tenemos listas para la comodidad y cuidado \n de tu mejor amigo', 
                      textAlign: TextAlign.center,
                      style: TextStyle(
                        color: Colors.white
                      ),
                    ),
                    Divider( height: 5, ),
                    FlatButton(
                      minWidth: 250,
                      color: Colors.blue[900],
                      onPressed: (){
                        if(auth.authenticated){
                          Navigator.push(context, MaterialPageRoute(builder: (context) => RoomsScreen()));
                        }else{
                          Navigator.push(context, MaterialPageRoute(builder: (context) => LoginScreen()));
                        }
                      }, 
                      child: Text(
                        'Reservar Ahora',
                        style: TextStyle(
                          color: Colors.white,
                          fontWeight: FontWeight.bold
                        ),
                      )
                    ),
                  ],
                )
              ),
              Card(
                elevation: 20.0,
                color: Colors.blueGrey[200],
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(10.0)
                ),
                child: Column(
                  children: [
                    Divider( height: 5,),
                    Text('Servicios',
                      overflow: TextOverflow.clip,
                      style: TextStyle(
                        fontWeight: FontWeight.w600,
                        color: Colors.black,
                        fontSize: 20.0,
                      ),
                    ),
                    Divider( height: 5,),                  
                    FadeInImage(
                      image: AssetImage('assets/images/servicio.jpg'),
                      placeholder: AssetImage('assets/images/load.gif'), 
                      fadeInDuration: Duration( milliseconds: 1000),
                      height: 230,
                      fit: BoxFit.cover,
                    ),
                    Divider( height: 5,),
                    Text(
                      'Contamos con variedad de habitaciones que \n tenemos listas para la comodidad y cuidado \n de tu mejor amigo', 
                      textAlign: TextAlign.center,
                      style: TextStyle(
                        color: Colors.black,
                        fontWeight: FontWeight.w500
                      ),
                    ),
                    Divider( height: 5, ),
                    FlatButton(
                      color: Colors.blueGrey[600],
                      minWidth: 250,
                      onPressed: (){
                        if(auth.authenticated){
                          Navigator.push(context, MaterialPageRoute(builder: (context) => ServiceScreen()));
                        }else{
                          Navigator.push(context, MaterialPageRoute(builder: (context) => LoginScreen()));
                        }
                      }, 
                      child: Text(
                        'Observar Servicios',
                        style: TextStyle(
                          color: Colors.white,
                          fontWeight: FontWeight.bold
                        ),
                      )
                    ),
                  ],
                )
              ),
              Card(
                elevation: 20.0, 
                color: Colors.black,
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(10.0)
                ),
                child: Column(
                  children: [
                    Divider( height: 5,),
                    Text('Premium',
                      overflow: TextOverflow.clip,
                      style: TextStyle(
                        fontWeight: FontWeight.w500,
                        fontStyle: FontStyle.italic,
                        color: Colors.deepOrange,
                        fontSize: 20.0,
                      ),
                    ),
                    Divider( height: 5,),                  
                    FadeInImage(
                      image: AssetImage('assets/images/logo.png'),
                      placeholder: AssetImage('assets/images/load.gif'), 
                      fadeInDuration: Duration( milliseconds: 1000),
                      height: 100,
                      fit: BoxFit.cover,
                    ),
                    Divider( height: 5,),
                    Text(
                      'Contamos con variedad de habitaciones que \n tenemos listas para la comodidad y cuidado \n de tu mejor amigo', 
                      textAlign: TextAlign.center,
                      style: TextStyle(
                        color: Colors.deepOrange
                      ),
                    ),
                    Divider( height: 10, ),
                    FlatButton(
                      color: Colors.red,
                      minWidth: 250,
                      onPressed: (){
                        if(auth.authenticated){
                          Navigator.push(context, MaterialPageRoute(builder: (context) => PremiumScreen()));
                        }else{
                          Navigator.push(context, MaterialPageRoute(builder: (context) => LoginScreen()));
                        }
                      }, 
                      child: Text(
                        'contratar por solo \$100/mes',
                        style: TextStyle(
                          color: Colors.white,
                          fontWeight: FontWeight.bold
                        ),
                      )
                    ),
                  ],
                )
              ),
            ],
          ),
        );
  }
}