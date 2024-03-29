import React, {Component} from 'react';
import TodoItem from './TodoItem';
import uuid from 'uuidv4';
import axios from 'axios';

class SearchBar extends Component{
    constructor(props){
        super(props);
        this.state = {
            value: '',
            todos: [
                {
                    todo: 'Eat Food',
                    id: 1
                },
                {
                    todo: 'Drink Water',
                    id: 2
                },
                {
                    todo: 'Study Code',
                    id: 3
                }
            ]
        }
    }
    componentDidMount(){
        axios.get('http://localhost:8000/api/data.php?action=read').then((resp) => {
            console.log('resp ', resp)
            this.setState({
                todos: resp.data.data
            })
        })

    }
    handleInput = (e) => {
        let typed = e.target.value;
        if(typed.length >= 50){
            return;
        }
        this.setState({
            value: typed
        })
    }
    handleSubmit = (e) =>{
        e.preventDefault();
        let {value} = this.state;
        if(!value){
            return;
        }
        axios.get(`http://localhost:8000/api/data.php?action=insert&todo=${value}`).then((resp) =>{
            console.log(resp)
        })
        

        let newTodo = {
            todo: this.state.value,
            id: Math.random() * 1000
        };

        this.setState({
            value: '',
            todos: [...this.state.todos, newTodo]
        })

    }
    handleDelete = (obj) => {
        let {todos} = this.state;
        let filteredTodos = todos.filter((todoObj) => {
            let {id} = todoObj;
            return obj.id !== id
        })
        this.setState({
            todos: filteredTodos
        })
    }
    handleEdit = (typed, id) => {
        let editedTodos = this.state.todos.map((todoObj) => {
            if(todoObj.id === id){
                todoObj.todo = typed;
            }
            return todoObj;
        })
        console.log('edited ', editedTodos);
        this.setState({
            todos: editedTodos
        })
        
    }
    render(){
        console.log('this.state.todos ', this.state.todos);
        return(
            <div>
                <form onSubmit={this.handleSubmit}>
                    <input onChange={this.handleInput} type="text" value={this.state.value} />
                    <span>
                        <button>Submit</button>
                    </span>
                </form>
                <ul>
                    {this.state.todos.map((obj, index) => {
                        return (
                            <TodoItem handleEdit={this.handleEdit} handleDelete={this.handleDelete} item={obj} index={obj.id} key={obj.id}/>
                        )
                    })}
                </ul>
            </div>
        )
    }
}
export default SearchBar;