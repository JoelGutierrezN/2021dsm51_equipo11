
import 'package:flutter/material.dart';
import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:provider/provider.dart';


import 'package:app/widgets/nav-drawer.dart';
import 'package:app/providers/auth.dart';
import 'package:app/screen/home-screen.dart';

void main() {
  runApp(
    ChangeNotifierProvider(
        create: (_) => Auth(),
        child: MyApp() 
      ),
  );
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'SafetyDogs',
      theme: ThemeData(
        primarySwatch: Colors.blue,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: MyHomePage(title: 'SafetyDogs'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key key, this.title}) : super(key: key);

  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  final storage = new FlutterSecureStorage();
  void _attemptAuthentication () async {
    final key = await storage.read(key: 'auth');
    Provider.of<Auth>(context, listen: false).attempt(key);
  }
  @override
  void initState() {
    _attemptAuthentication();
    super.initState();
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFFFFF3E0),
      appBar: AppBar(
        centerTitle: true,
        title: Text(widget.title),
        backgroundColor: Color(0xFFFF5722),
      ),
      drawer: NavDrawer(),
      body: HomeScreen()
    );
  }
}
