#include <stdio.h>
#include <string.h>

int main () {
    char username[8];
    int allow = 0;

    printf(""Enter your username, please: "");
    fgets(username, sizeof(username), stdin);

    username[strcspn(username, ""\n"")] = 0;

    if (grantAccess(username)) {
        allow = 1;
    }
    if (allow != 0) {
        privilegedAction();
    }
    return 0;
}