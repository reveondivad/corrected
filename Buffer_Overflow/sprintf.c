#include <stdio.h>
#include <stdlib.h>

enum { BUFFER_SIZE = 50 };

int main() {
    char buffer[BUFFER_SIZE];
    int check = 0;

    snprintf(buffer, BUFFER_SIZE, ""%s"", ""This string does not meant anything ..."");

    printf(""check: %d"", check);

    return EXIT_SUCCESS;
}