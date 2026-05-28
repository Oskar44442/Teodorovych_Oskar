function TaskItem({ task, deleteTask, toggleTask }) {
  return (
    <div>
      <span
        style={{
          textDecoration: task.completed
            ? 'line-through'
            : 'none',
          marginRight: '10px',
        }}
      >
        {task.title}
      </span>

      <button onClick={() => toggleTask(task.id)}>
        Виконано
      </button>

      <button onClick={() => deleteTask(task.id)}>
        Видалити
      </button>
    </div>
  );
}

export default TaskItem;