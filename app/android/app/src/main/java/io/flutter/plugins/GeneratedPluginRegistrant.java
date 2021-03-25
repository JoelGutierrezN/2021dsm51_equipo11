package io.flutter.plugins;

import io.flutter.plugin.common.PluginRegistry;
import io.flutter.plugins.deviceinfo.DeviceInfoPlugin;
import com.it_nomads.fluttersecurestorage.FlutterSecureStoragePlugin;
import com.di1shuai.platform_device_id.PlatformDeviceIdPlugin;

/**
 * Generated file. Do not edit.
 */
public final class GeneratedPluginRegistrant {
  public static void registerWith(PluginRegistry registry) {
    if (alreadyRegisteredWith(registry)) {
      return;
    }
    DeviceInfoPlugin.registerWith(registry.registrarFor("io.flutter.plugins.deviceinfo.DeviceInfoPlugin"));
    FlutterSecureStoragePlugin.registerWith(registry.registrarFor("com.it_nomads.fluttersecurestorage.FlutterSecureStoragePlugin"));
    PlatformDeviceIdPlugin.registerWith(registry.registrarFor("com.di1shuai.platform_device_id.PlatformDeviceIdPlugin"));
  }

  private static boolean alreadyRegisteredWith(PluginRegistry registry) {
    final String key = GeneratedPluginRegistrant.class.getCanonicalName();
    if (registry.hasPlugin(key)) {
      return true;
    }
    registry.registrarFor(key);
    return false;
  }
}