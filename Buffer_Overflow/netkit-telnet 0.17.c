static void env_fix_display(void) {
    enviro *ep = env_find(""DISPLAY"");
    if (!ep) return;
    ep->setexport(1);
    if (strncmp(ep->getval(), "":"", 1) != 0 && strncmp(ep->getval(), ""UNIX"", 5) != 0) {
        return;
    }
    char hbuf[256];
    const char *cp2 = strrchr(ep->getval(), ':');
    if (cp2 == NULL) {
        return;
    }
    int maxlen = sizeof(hbuf) - strlen(cp2) - 1;
    if (maxlen <= 0) {
        return;
    }
    gethostname(hbuf, maxlen);
    hbuf[maxlen] = '\0';
    if (strchr(hbuf, '.') == NULL) {
        struct hostent *h = gethostbyname(hbuf);
        if (h) {
            strncpy(hbuf, h->h_name, maxlen);
            hbuf[maxlen] = '\0';
        }
    }
    strncat(hbuf, cp2, sizeof(hbuf)-strlen(hbuf)-1);
    ep->define(""DISPLAY"", hbuf);
}