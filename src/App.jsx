import { useState, useEffect } from 'react';

import Header from './components/Header';
import TaskForm from './components/TaskForm';
import TaskList from './components/TaskList';

function App() {
  const [tasks, setTasks] = useState([]);

  // Додавання задачі
  const addTask = (title) => {
    const newTask = {
      id: Date.now(),
      title: title,
      completed: false,
    };

    setTasks([...tasks, newTask]);
  };

  // Видалення задачі
  const deleteTask = (id) => {
    setTasks(tasks.filter(task => task.id !== id));
  };

  // Зміна статусу
  const toggleTask = (id) => {
    setTasks(
      tasks.map(task =>
        task.id === id
          ? { ...task, completed: !task.completed }
          : task
      )
    );
  };

  // useEffect
  useEffect(() => {
    console.log(`Кількість задач: ${tasks.length}`);
  }, [tasks]);

  return (
    <div style={{ padding: '20px' }}>
      <Header />

      <TaskForm addTask={addTask} />

      <TaskList
        tasks={tasks}
        deleteTask={deleteTask}
        toggleTask={toggleTask}
      />
    </div>
  );
}

export default App;