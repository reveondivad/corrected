#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <time.h>

#define FLAG_BUFFER 128
#define MAX_SYM_LEN 4

typedef struct Stonks {
	int shares;
	char symbol[MAX_SYM_LEN + 1];
	struct Stonks *next;
} Stonk;

typedef struct Portfolios {
	int money;
	Stonk *head;
} Portfolio;

int view_portfolio(Portfolio *p) {
	if (!p) {
		return 1;
	}
	printf(""\nPortfolio as of "");
	fflush(stdout);
	time_t t = time(NULL);
	struct tm tm = *localtime(&t);
	printf(""%d-%d-%d %d:%d:%d\n"", tm.tm_year + 1900, tm.tm_mon + 1, tm.tm_mday, tm.tm_hour, tm.tm_min, tm.tm_sec);
	fflush(stdout);

	printf(""\n\n"");
	Stonk *head = p->head;
	if (!head) {
		printf(""You don't own any stonks!\n"");
	}
	while (head) {
		printf(""%d shares of %s\n"", head->shares, head->symbol);
		head = head->next;
	}
	return 0;
}

Stonk *pick_symbol_with_AI(int shares) {
	if (shares < 1) {
		return NULL;
	}
	Stonk *stonk = malloc(sizeof(Stonk));
	stonk->shares = shares;

	int AI_symbol_len = (rand() % MAX_SYM_LEN) + 1;
	for (int i = 0; i < AI_symbol_len; i++) {
		stonk->symbol[i] = 'A' + (rand() % 26);
	}
	stonk->symbol[AI_symbol_len] = '\0';

	stonk->next = NULL;

	return stonk;
}

int buy_stonks(Portfolio *p) {
	if (!p) {
		return 1;
	}
	int money = p->money;
	int shares = 0;
	Stonk *temp = NULL;
	printf(""Using patented AI algorithms to buy stonks\n"");
	while (money > 0) {
		shares = (rand() % money) + 1;
		temp = pick_symbol_with_AI(shares);
		temp->next = p->head;
		p->head = temp;
		money -= shares;
	}
	printf(""Stonks chosen\n"");

	char *user_buf = malloc(300 + 1);
	printf(""What is your API token?\n"");
	fgets(user_buf, 300, stdin);
	user_buf[strcspn(user_buf, ""\n"")] = 0;
	printf(""Buying stonks with token:\n"");
	printf(""%s\n"", user_buf);

	free(user_buf);

	view_portfolio(p);

	return 0;
}

Portfolio *initialize_portfolio() {
	Portfolio *p = malloc(sizeof(Portfolio));
	p->money = (rand() % 2018) + 1;
	p->head = NULL;
	return p;
}

void free_portfolio(Portfolio *p) {
	Stonk *current = p->head;
	Stonk *next = NULL;
	while (current) {
		next = current->next;
		free(current);
		current = next;
	}
	free(p);
}

int main(int argc, char *argv[])
{
	setbuf(stdout, NULL);
	srand(time(NULL));
	Portfolio *p = initialize_portfolio();
	if (!p) {
		printf(""Memory failure\n"");
		exit(1);
	}

	int resp = 0;

	printf(""Welcome back to the trading app!\n\n"");
	printf(""What would you like to do?\n"");
	printf(""1) Buy some stonks!\n"");
	printf(""2) View my portfolio\n"");
	scanf(""%d"", &resp);
	getchar();

	if (resp == 1) {
		buy_stonks(p);
	} else if (resp == 2) {
		view_portfolio(p);
	}

	free_portfolio(p);
	printf(""Goodbye!\n"");

	exit(0);
}