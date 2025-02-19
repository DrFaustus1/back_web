import heapq
import copy

class Node:
    def __init__(self, matrix, active_rows, active_cols, assigned, cost):
        self.matrix = matrix
        self.active_rows = active_rows
        self.active_cols = active_cols
        self.assigned = assigned
        self.cost = cost
        self.size = len(matrix)

    def __lt__(self, other):
        return self.cost < other.cost

def reduce_matrix(matrix):
    n = len(matrix)
    reduced = [row.copy() for row in matrix]
    reduction_sum = 0

    # Редукция строк
    for i in range(n):
        min_val = min(reduced[i])
        if min_val != 0:
            reduction_sum += min_val
            for j in range(n):
                reduced[i][j] -= min_val

    # Редукция столбцов
    for j in range(n):
        min_val = min(reduced[i][j] for i in range(n))
        if min_val != 0:
            reduction_sum += min_val
            for i in range(n):
                reduced[i][j] -= min_val

    return reduction_sum, reduced

def select_branching_pair(matrix):
    n = len(matrix)
    max_theta = -1
    best_pair = None

    for i in range(n):
        for j in range(n):
            if matrix[i][j] == 0:
                # Вычисляем alpha_i
                row = matrix[i]
                alpha = min(val for idx, val in enumerate(row) if idx != j)
                # Вычисляем beta_j
                col = [matrix[k][j] for k in range(n)]
                beta = min(val for idx, val in enumerate(col) if idx != i)
                theta = alpha + beta
                if theta > max_theta:
                    max_theta = theta
                    best_pair = (i, j)

    return best_pair, max_theta

def branch_and_bound(initial_matrix):
    n = len(initial_matrix)
    initial_reduction, reduced_matrix = reduce_matrix(initial_matrix)
    initial_node = Node(
        reduced_matrix,
        list(range(n)),
        list(range(n)),
        [],
        initial_reduction
    )

    priority_queue = []
    heapq.heappush(priority_queue, (initial_node.cost, initial_node))

    best_cost = float('inf')
    best_assignment = None

    while priority_queue:
        current_cost, current_node = heapq.heappop(priority_queue)

        if current_cost >= best_cost:
            continue

        if current_node.size == 0:
            if current_node.cost < best_cost:
                best_cost = current_node.cost
                best_assignment = current_node.assigned
            continue

        if current_node.size == 1:
            # Добавляем последнее назначение
            i = current_node.active_rows[0]
            j = current_node.active_cols[0]
            final_assignment = current_node.assigned + [(i, j)]
            total_cost = current_node.cost + current_node.matrix[0][0]
            if total_cost < best_cost:
                best_cost = total_cost
                best_assignment = final_assignment
            continue

        branching_pair, theta = select_branching_pair(current_node.matrix)
        if not branching_pair:
            continue

        r, m = branching_pair

        # Создаем узел D1
        original_r = current_node.active_rows[r]
        original_m = current_node.active_cols[m]
        new_active_rows = [row for idx, row in enumerate(current_node.active_rows) if idx != r]
        new_active_cols = [col for idx, col in enumerate(current_node.active_cols) if idx != m]
        new_matrix = []
        for i in range(current_node.size):
            if i != r:
                new_row = [current_node.matrix[i][j] for j in range(current_node.size) if j != m]
                new_matrix.append(new_row)
        reduction_sum, reduced_new_matrix = reduce_matrix(new_matrix)
        new_assigned = current_node.assigned + [(original_r, original_m)]
        new_cost = current_node.cost + reduction_sum
        D1_node = Node(reduced_new_matrix, new_active_rows, new_active_cols, new_assigned, new_cost)
        if D1_node.cost < best_cost:
            heapq.heappush(priority_queue, (D1_node.cost, D1_node))

        # Создаем узел D2
        D2_matrix = [row.copy() for row in current_node.matrix]
        D2_matrix[r][m] = float('inf')
        reduction_sum, reduced_D2_matrix = reduce_matrix(D2_matrix)
        assert reduction_sum == theta, f"Reduction sum {reduction_sum} != theta {theta}"
        new_cost_D2 = current_node.cost + theta
        D2_node = Node(
            reduced_D2_matrix,
            current_node.active_rows.copy(),
            current_node.active_cols.copy(),
            current_node.assigned.copy(),
            new_cost_D2
        )
        if D2_node.cost < best_cost:
            heapq.heappush(priority_queue, (D2_node.cost, D2_node))

    return best_assignment, best_cost

# Пример использования
if __name__ == "__main__":
    # Пример матрицы издержек (3x3)
    cost_matrix = [
        [9, 2, 7],
        [6, 4, 3],
        [5, 8, 1]
    ]

    assignment, total_cost = branch_and_bound(cost_matrix)
    print("Оптимальное назначение:", assignment)
    print("Минимальная сумма издержек:", total_cost)
