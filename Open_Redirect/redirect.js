#include<stdio.h>
#include<stdlib.h>
#include<string.h>

struct Image
{
	char header[4];
	int width;
	int height;
	char data[10];
};

int ProcessImage(char* filename){

	FILE *fp;
	struct Image img;

	fp = fopen(filename,""r""); 

	if(fp == NULL)
	{
		printf(""\nCan't open file or file doesn't exist."");
		exit(0);
	}

	printf(""\n\tHeader\twidth\theight\tdata\t\r\n"");

	while(fread(&img,sizeof(img),1,fp)>0){
		printf(""\n\t%s\t%d\t%d\t%s\r\n"",img.header,img.width,img.height,img.data);
	
		int size1 = img.width + img.height;
		char* buff1=(char*)malloc(size1);

		if(buff1 == NULL) {
			printf(""\nFailed to allocate memory."");
			exit(0);
		}

		memcpy(buff1,img.data,sizeof(img.data));
	
		if (size1 == 123456){
			buff1[0]='a';
		}

		free(buff1);

		int size2 = img.width - img.height+100;
		char* buff2=(char*)malloc(size2);

		if(buff2 == NULL) {
			printf(""\nFailed to allocate memory."");
			exit(0);
		}

		memcpy(buff2,img.data,sizeof(img.data));

		int size3= img.width/img.height;

		char* buff4 =(char*)malloc(size3);

		if(buff4 == NULL) {
			printf(""\nFailed to allocate memory."");
			exit(0);
		}

		memcpy(buff4,img.data,sizeof(img.data));

		if(size3>10){
			buff4=0;
		}

		free(buff2);
		free(buff4);
	}
	fclose(fp);
}

int main(int argc,char **argv)
{
	ProcessImage(argv[1]);
}