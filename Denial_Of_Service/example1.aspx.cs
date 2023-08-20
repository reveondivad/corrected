#include <iostream>
#include <cstdlib>
#include <climits>
#include <thread>

int main() {
    int i;
    char inLine[64];
    std::cin.getline(inLine, sizeof(inLine));
    i = std::strtol(inLine, nullptr, 10);
    if(i < 0 || i > INT_MAX) {
        std::cout << ""Invalid input"";
        return 1;
    }
    std::this_thread::sleep_for(std::chrono::seconds(i));
    return 0;
}