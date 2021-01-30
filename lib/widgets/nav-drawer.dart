import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_authentication_with_laravel_sanctum/providers/auth.dart';
import 'package:flutter_authentication_with_laravel_sanctum/screen/login-screen.dart';
import 'package:flutter_authentication_with_laravel_sanctum/screen/post-screen.dart';
import 'package:provider/provider.dart';

class NavDrawer extends StatelessWidget {

  @override 
  Widget build( BuildContext context ){
    return Drawer( 
      child: Consumer<Auth>(
        builder: (context, auth, child){
          if (auth.authenticated) {
            return ListView(
            children: [
              ListTile(
                title: Text(auth.user.name),
              ),
              ListTile(
                  title: Text('Publicaciones'),
                  onTap: () {
                    Navigator.push(context,
                        MaterialPageRoute(builder: (context) => PostsScreen()));
                  }
              ),
              ListTile(
                  title: Text('Cerrar Sesion'),
                  onTap: () {
                    Provider.of<Auth>(context, listen: false).logout();
                  }
                )
              ],
            );
          }else{
            return ListView(
              children: [
                ListTile(
                  title: Text('Iniciar Sesion'),
                  onTap: () {
                    Navigator.push( context, MaterialPageRoute (
                      builder: (context) => LoginScreen()
                    ));
                  }
                ),
                ListTile(
                  title: Text('Registrar'),
                  onTap: () {
                    Navigator.push( context, MaterialPageRoute (
                      builder: (context) => LoginScreen()
                    ));
                  }
                )
              ],
            );
          }
        }
      )
    );
  }
}