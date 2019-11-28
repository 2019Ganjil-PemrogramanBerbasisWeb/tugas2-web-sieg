/*Program untuk mengenkripsi kata dengan metode caesar cipher*/
/*ASCII
	'A'=65, 'B'=66, 'C'=67, ...
	'a'=97, 'b'=98, 'c'=99, ...
*/
#include<stdio.h>
 
int main()
{
	char message[100]/* panjang karakter*/, ch;
	int i, key;
	
	printf("Enter a message to encrypt: ");
	gets(message);
	printf("Enter key: ");
	scanf("%d", &key);
	
	for(i = 0; message[i] != '\0'; ++i){	//'\0' = null character
		ch = message[i];
		
		if(ch >= 'a' && ch <= 'z'){
			ch = (ch + key - 'a') %26 +97; // apabila huruf kecil
				
			message[i] = ch;	// hasil penghitungan
		}
		else if(ch >= 'A' && ch <= 'Z'){
			ch = (ch + key - 'A') %26 +65;	// apabila huruf besar
			
			
			message[i] = ch;	// hasil penghitungan
		}
	}
	
	printf("Encrypted message: %s", message);
	
	return 0;
}
