import math


def f(x):
    return 2 * x ** 2 - 12 * x + 19


def dichotomy_method(a, b, E, d):
    k = 0
    N = 0
    while b - a >= E:
        y = (a + b - d) / 2
        z = (a + b + d) / 2
        if f(y) <= f(z):
            b = z
        else:
            a = y
        N += 2
        k += 1

    x = (a + b) / 2
    R = 1.0 / (2 ** (N / 2))
    return x, k, N, a, b, R


def golden_section(a, b, E):
    k = 0
    N = 0
    phi = (3 - math.sqrt(5)) / 2
    y = a + phi * (b - a)
    z = a + b - y
    fy = f(y)
    fz = f(z)
    N += 2

    while b - a >= E:
        if fy <= fz:
            b = z
            z = y
            fz = fy
            y = a + b - z
            fy = f(y)
        else:
            a = y
            y = z
            fy = fz
            z = a + b - y
            fz = f(z)
        N += 1
        k += 1

    x = (a + b) / 2
    R = (0.618) ** N
    return x, k, N, a, b, R


def fibonacci_method(a, b, E):
    # Генерация последовательности Фибоначчи без отдельной функции
    fib = [1, 1]
    while fib[-1] < (b - a) / E:
        fib.append(fib[-1] + fib[-2])

    N = len(fib) - 1
    k = 0

    y = a + (fib[N - 2] / fib[N]) * (b - a)
    z = a + (fib[N - 1] / fib[N]) * (b - a)
    fy = f(y)
    fz = f(z)

    for k in range(1, N - 2):
        if fy <= fz:
            b = z
            z = y
            fz = fy
            y = a + (fib[N - k - 2] / fib[N - k]) * (b - a)
            fy = f(y)
        else:
            a = y
            y = z
            fy = fz
            z = a + (fib[N - k - 1] / fib[N - k]) * (b - a)
            fz = f(z)

    z = y + 0.2  # δ = 0.2
    if f(y) <= f(z):
        b = z
    else:
        a = y

    x = (a + b) / 2
    R = 1.0 / fib[N]
    return x, N - 3, N, a, b, R


# Параметры задачи
a, b = 0.0, 10.0
E, d = 0.5, 0.2

# Вычисление и вывод результатов
methods = [
    ("Метод дихотомии", dichotomy_method(a, b, E, d)),
    ("Метод золотого сечения", golden_section(a, b, E)),
    ("Метод Фибоначчи", fibonacci_method(a, b, E))
]

for name, result in methods:
    x, k, N, a_res, b_res, R = result
    print(f"{name}:")
    print(f"Интервал: [{a_res:.4f}, {b_res:.4f}]")
    print(f"x = {x:.4f}, f(x) = {f(x):.4f}")
    print(f"Итерации: {k}, Вычисления: {N}, R(N) = {R:.6f}\n")
