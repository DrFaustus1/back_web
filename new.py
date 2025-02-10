


def matrix_vector_multiply(matrix, vec):
    return [sum(matrix[i][j] * vec[j] for j in range(len(vec))) for i in range(len(matrix))]


def vector_norm(vec):
    return sum(x ** 2 for x in vec) ** 0.5


def normalize_vector(vec):
    norm = vector_norm(vec)
    return [x / norm for x in vec]

def power_iteration(matrix, max_iter=1000, tol=1e-6):
    n = len(matrix)
    b = [1.0] * n  

    eigenvalue = 0.0

    for _ in range(max_iter):
        new_b = matrix_vector_multiply(matrix, b)
        eigenvalue = vector_norm(new_b)
        new_b = normalize_vector(new_b)

        
        diff = sum(abs(new_b[i] - b[i]) for i in range(n))

        b = new_b

        if diff < tol:
            break

    return eigenvalue, b

if __name__ == "__main__":
    matrix = [
        [4, 1],
        [1, 3]
    ]

    eigenvalue, eigenvector = power_iteration(matrix)

    print("Наибольшее собственное значение:", eigenvalue)
    print("Соответствующий собственный вектор:", eigenvector)

