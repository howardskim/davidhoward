import React, {Component} from 'react';

class TodoItem extends Component{
    constructor(props){
        super(props);
        this.state = {
            complete: false,
            editClicked: false,
            updatedValue: ''
        }
    }
    handleClick = () => {
        this.setState({
            complete: !this.state.complete
        })
    }
    handleEdit = () => {
        this.setState({
            editClicked: !this.state.editClicked
        })
    }
    handleChange = (e) => {
        this.setState({
            updatedValue: e.target.value
        })
    }
    handleUpdate = () => {
        this.props.handleEdit(this.state.updatedValue, this.props.item.id);
        this.setState({
            editClicked: false
        })
    }
    render(){
        let { item, handleDelete, handleEdit} = this.props;
        let {todo, id} = item
        let style = {textDecoration: 'line-through'}
        return(
            <div style={{display: 'flex'}}>
                <li style={this.state.complete ? style : {}} onClick={this.handleClick}>{todo}</li>
                <button onClick={() => {handleDelete(item)}} style={{marginLeft: '1%'}}>X</button>
                <button onClick={this.handleEdit}>Edit</button>
                {this.state.editClicked ? (
                    <div style={{display: 'flex'}}>
                        <input onChange={this.handleChange} type="text" value={this.state.updatedValue} />
                        <button onClick={this.handleUpdate}>Update</button>
                    </div>
                ) : ''}
            </div>
        )
    }
}


export default TodoItem;