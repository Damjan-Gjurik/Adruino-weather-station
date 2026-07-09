#include "DHT.h"

#define DHTPIN 4
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);
void setup() {
  dht.begin();
  Serial.begin(9600);

}

void loop() {
  float temp = dht.readTemperature();
  float hum = dht.readHumidity();

  Serial.print(temp);
  Serial.print(",");
  Serial.println(hum);

  delay(5000);

}
