import React from "react";
import Plus from "../../assets/icons/addPlus";


interface Props {
    onClick: (event: React.MouseEvent<HTMLButtonElement>) => void;
}

const AddImage: React.FC<Props> = ({ onClick, }) => {
    //const [value, setValue] = useState("");
    return (
        <button
            onClick={onClick}
            className="rounded-full w-40 h-40 bg-gray-300"
        >
            <div className="w-16 h-16 mx-12"><Plus /></div>
        </button>
    );
};

export default AddImage;
