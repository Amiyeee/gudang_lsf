#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>
#include <Wire.h>
#include <LiquidCrystal_PCF8574.h>

#define SS_PIN D8
#define RST_PIN D4
#define BUZZER_PIN D3

MFRC522 mfrc522(SS_PIN, RST_PIN);
LiquidCrystal_PCF8574 lcd(0x27);

const char* ssid = "LSF";
const char* password = "lintech889";
const char* serverUrl = "http://192.168.10.239/gudang_lsf-main/manajemen_gudang/getUID.php";

byte readcard[4];
char str[32];
String StrUID;

void setup() {
  Serial.begin(115200);
  SPI.begin();
  mfrc522.PCD_Init();

  Wire.begin(D2, D1);
  lcd.begin(16, 2);
  lcd.setBacklight(HIGH);
  lcd.setCursor(0, 0);
  lcd.print("Scanning...");

  pinMode(BUZZER_PIN, OUTPUT);
  digitalWrite(BUZZER_PIN, LOW);

  WiFi.begin(ssid, password);
  Serial.print("Connecting");
  lcd.setCursor(0, 1);
  lcd.print("Connecting...");

  int timeout = 20;
  while (WiFi.status() != WL_CONNECTED && timeout > 0) {
    Serial.print(".");
    delay(500);
    timeout--;
  }

  if (WiFi.status() == WL_CONNECTED) {
    Serial.println("\nConnected to WiFi!");
    Serial.print("IP Address: ");
    Serial.println(WiFi.localIP());
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("WiFi Connected");
    delay(1000);
  } else {
    Serial.println("\nFailed to connect WiFi.");
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("WiFi Failed!");
  }

  lcd.clear();
  lcd.print("Scan Your Card");
}

void loop() {
  if (getid()) {
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("UID: ");
    lcd.setCursor(0, 1);
    lcd.print(StrUID);

    Serial.println("Buzzer ON");
    digitalWrite(BUZZER_PIN, HIGH);
    delay(200);
    digitalWrite(BUZZER_PIN, LOW);
    Serial.println("Buzzer OFF");

    sendData();
    delay(2000);
  }
}

int getid() {
  if (!mfrc522.PICC_IsNewCardPresent()) return 0;
  if (!mfrc522.PICC_ReadCardSerial()) return 0;

  Serial.print("Kartu Terbaca: ");
  for (int i = 0; i < 4; i++) {
    readcard[i] = mfrc522.uid.uidByte[i];
  }
  array_to_string(readcard, 4, str);
  StrUID = str;
  Serial.println(StrUID);

  mfrc522.PICC_HaltA();
  return 1;
}

void sendData() {
  if (WiFi.status() == WL_CONNECTED) {
    WiFiClient client;
    HTTPClient http;

    String postData = "UIDresult=" + StrUID;
    http.begin(client, serverUrl);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    int httpCode = http.POST(postData);
    String payload = http.getString();

    Serial.println("Server Response: " + String(httpCode));
    Serial.println("Payload: " + payload);

    http.end();
  } else {
    Serial.println("WiFi Disconnected!");
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("WiFi Lost!");
  }
}

void array_to_string(byte array[], unsigned int len, char buffer[]) {
  for (unsigned int i = 0; i < len; i++) {
    byte nib1 = (array[i] >> 4) & 0x0F;
    byte nib2 = (array[i] >> 0) & 0x0F;
    buffer[i * 2] = nib1 < 0xA ? '0' + nib1 : 'A' + nib1 - 0xA;
    buffer[i * 2 + 1] = nib2 < 0xA ? '0' + nib2 : 'A' + nib2 - 0xA;
  }
  buffer[len * 2] = '\0';
}
