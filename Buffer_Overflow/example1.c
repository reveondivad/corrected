#include <stdio.h>
#include <string.h>

int main(void)
{
    char name[64];
    printf(""Enter your name: "");
    fgets(name, sizeof(name), stdin);
    name[strcspn(name, ""\n"")] = 0;
    printf(""Welcome, %s!"", name);
    return 0;
}